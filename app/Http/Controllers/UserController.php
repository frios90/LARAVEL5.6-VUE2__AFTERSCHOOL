<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Rules\validateRut;
use App\Mail\NewUserMail;
use Illuminate\Support\Facades\Mail;


use Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function userAuth() {
        return response(Auth::user(), 200);
    }
   
    public function index()
    {
        return view('master');
    }   
   
    public function getTableList (Request $request)
    {
        $profile = '';
        switch ($request->input('profile')) {
            case 'admin'   : $profile = Profile::where('name', '=', 'admin')->first()->id; break;
            case 'teacher' : $profile = Profile::where('name', '=', 'teacher')->first()->id; break;
            case 'attorney': $profile = Profile::where('name', '=', 'attorney')->first()->id; break;
            case 'alumn'   : $profile = Profile::where('name', '=', 'alumn')->first()->id; break;
        }
        $list = User::with('alumns', 'attorney')
                    ->withTrashed()
                    ->where('profile_id', '=', $profile)
                    ->orderBy('rut', 'ASC')
                    ->get();
        return response($list, 200);
    }

    public function store(Request $request)
    {
        if ( $request->input('post_event') == 'store' ) {
            $request->validate([
                'rut'        => ['required','unique:users', 'max:12', new validateRut],
                'name'       => ['required'],
                'phone'      => ['required', 'numeric', 'max:99999999999'],
                'email'      => ['required', 'unique:users', 'email'],
                'address'    => ['required'],
                'genere'     => ['required'],
                'birthdate'  => ['required'],
                'commune_id' => ['required'],
                'region_id'  => ['required'],
                'country_id' => ['required'],
                'profile'    => ['required'],
            ]);
            $profile = Profile::where('name', '=', $request->input('profile'))->first()->id;;
            $email   = $request->input('email');
            if ($request->input('profile') == 'alumn') {
                $email                     = $request->input('attorney_id').date('YmdHis').'@nomail.com';
                $data_user['attorney_id']  = $request->input('attorney_id');
            }
            $data_user['rut']        = $request->input('rut');
            $data_user['name']       = $request->input('name');
            $data_user['address']    = $request->input('address'); 
            $data_user['phone']      = $request->input('phone');
            $data_user['email']      = $email;
            $data_user['birthdate']  = $request->input('birthdate');
            $data_user['genere']     = $request->input('genere');
            $data_user['profile_id'] = $profile;
            $data_user['country_id'] = $request->input('country_id');
            $data_user['commune_id'] = $request->input('commune_id');
            $data_user['region_id']  = $request->input('region_id');
            $pass =  substr($data_user['rut'], 7, 3) . date( 'd' , strtotime($data_user['birthdate'])) . date( 'm' , strtotime($data_user['birthdate']));
            $data_user['password']   = bcrypt($pass);  
            
            $user = User::firstOrCreate($data_user);
            if ($request->input('profile') != 'alumn') {
                $data_user['text_pass']  =   $pass;    
                Mail::to($data_user['email'])->send(new NewUserMail($data_user));
            }
            return $user;
        } else {
            $id = $request->input('id');
            $request->validate([
                'id'         => ['required'],
                'rut'        => ['required','unique:users,rut,'.$id, 'max:12', new validateRut],
                'name'       => ['required'],
                'phone'      => ['required', 'numeric', 'max:99999999999'],
                'email'      => ['required', 'unique:users,email,'.$id],
                'address'    => ['required'],
                'genere'     => ['required'],
                'birthdate'  => ['required'],
                'commune_id' => ['required'],
                'region_id'  => ['required'],
                'country_id'  => ['required'],
                'profile'    => ['required'],
            ]);
            $user             = User::find($id);
            $user->rut        = $request->input('rut');
            $user->name       = $request->input('name');
            $user->phone      = $request->input('phone');
            $user->email      = $request->input('email');
            $user->address    = $request->input('address');
            $user->genere     = $request->input('genere');
            $user->birthdate  = $request->input('birthdate');
            $user->commune_id = $request->input('commune_id');
            $user->region_id  = $request->input('region_id');
            $user->country_id  = $request->input('country_id');
            $user->save();
            return $user;
        }               
    }   

    public function status (Request $request)
    {
        $id = $request->input('id');
        $user = User::where('id', '=', $request->input('id'))->withTrashed()->first();        
        if ($user->deleted_at) {
            $user->restore();
        } else {
            $user->delete();
        }
        return response(User::all(), 200);
    }

    public function getUserSession (Request $request)
    {
        return response(Auth::user(), 200);
    } 
    
    public function getMe (Request $request)
    {
        return response(User::with('profile')->find(Auth::user()->id), 200);
    }

    public function mePassStore (Request $request) {
        $request->validate([      
            'id'          => ['required'],      
            'new_pass'    => ['required'],
            'repeat_pass' => ['required'],
        ]);
        if ($request->input('new_pass') != $request->input('repeat_pass')) {
            return response(['errors'=> ['new_pass' =>  ['Las contraseñas deber coincidir.'],
                                         'repeat_pass' =>  ['Las contraseñas deber coincidir.']]], 422);
        }
        $user = User::find($request->input('id'));
        $user->password = bcrypt($request->input('new_pass')); 
        $user->save();
        return $user;


    }

}
