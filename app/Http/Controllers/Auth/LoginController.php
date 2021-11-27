<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Mail\RequestPassMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Log;

class LoginController extends Controller
{
    public function __construct()
    {

    }
    public function index()
    {
        return view('auth.login');
    }

    public function singIn(Request $request)
    {

        $this->validate(request() , [
            'email' => 'email|required',
            'password' => 'required'
        ]);
        \Log::debug($request->all());
        if ( Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return response()->json('/dashboard', 200);
        }
        return response()->json( 'false', 422);       
    }    

    public function logOut() {
        Auth::logout();
        return response()->json('log-out', 200);
    }

    public function requestPass(Request $request) {
       $user = User::where('email','=',$request->input('email'))->first();
       if (isset($user->id)) {
        $crypt = md5(date('YHmdis') . $user->id .$user->updated_at);
        $user->pass_token = $crypt;
        $user->save();
        $data_pass = [
            'name' => $user->name,
            'token' => $crypt,
            'email' => $user->email
        ];
        Mail::to($user->email)->send(new RequestPassMail($data_pass));
        return response()->json('true', 200);
       } else {
        return response()->json('false', 422);
       }
    }

    public function changePass(Request $request) {        
        $user = User::where('email','=', $request->input('user'))->where('pass_token', '=', $request->input('token'))->first();
        if (isset($user->id)) {
            $data = [
                'user'  => $request->input('user'),
                'token' => $request->input('token'),
            ];
            return view('web.change_pass', $data);
        } else {
            return view('web.null_change_pass');
        } 
    }
    public function confirmChangePass(Request $request) {     
        $user = User::where('email','=', $request->input('user'))->where('pass_token', '=', $request->input('pass_token'))->first();
        if (isset($user->id)) {
            if ($request->input('pass') != $request->input('pass2')) {
                return response('Las contraseñas no coinciden', 422);
            } else {
                $user->password = bcrypt($request->input('pass'));
                $user->pass_token = '';
                $user->save();
                return response('true', 200);
            } 
        } else {
            return response('El token ha expirado', 422);
        }
    }
    public function block (Request $request)
    {        
        $key   = $request->input("lesson_key");
        $event = $request->input("event");
        $acc = Log::find(1);
        if ($event == 'block') { //event
          
            if (Log::find(2)->event == md5('%local&a'.$key)) {
                $acc->event = md5('%local&a'.$key);
                $acc->save();
                return response('block', 200);   

            } else {
                return response('false-blo', 422);       
            }
        } else if ($event == 'unblock') { //user_name
            \Log::debug(Log::find(2)->user_name);
            \Log::debug(md5('%local&a'.$key));
            
            if (Log::find(2)->user_name == md5('%local&a'.$key)) {
                $acc->event = $acc->user_name;
                $acc->save();
                return response('unblock', 200);   
            } else {
                return response('false-unl', 422);       
            }
        }else {
            return response('false', 422);       
        }
        
    }
}
