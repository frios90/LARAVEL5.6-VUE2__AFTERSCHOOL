<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;

class TeacherController extends Controller
{    
    public function index()
    {
        return view('master');
    }
 
    /**Listado completo de staff 
     * para index del panel 
     * de gestión de staff
     *  */
    public function getTableList ()
    {
       
        $list = User::withTrashed()
                    ->where('profile_id', '=', Profile::where('name', '=', 'teacher')->first()->id)
                    ->orderBy('rut', 'ASC')
                    ->get();
        return response($list, 200);
    }

    public function getListWithTrashed ()
    {
        // $list = Teacher::withtrashed()
        //             ->where('company_id', '=',  Auth::user()->company_id)                        
        //             ->orderBy('rut', 'ASC')
        //             ->get();
        // return response($list, 200);
    }

    
    /**
     * almacenar nuevo staff
     */
    public function store(Request $request)
    {

        $request->validate([
            'rut'        => ['required','unique:users', 'max:12', new validateRut],
            'name'       => ['required'],
            'phone'      => ['required', 'numeric', 'max:999999999'],
            'email'      => ['required', 'unique:users', 'email'],
            'region_id'  => ['required'],
            'commune_id' => ['required'],
            'address'    => ['required'],
            'country'    => ['required']
           
        ]);
        $data_staff['rut']        = $request->input('rut');
        $data_staff['name']       = $request->input('name');
        $data_staff['address']    = $request->input('address'); 
        $data_staff['phone']      = $request->input('phone');
        $data_staff['email']      = $request->input('email');
        $data_staff['country']    = $request->input('country');
        $data_staff['commune_id'] = $request->input('commune_id');
        $data_staff['company_id'] = Auth::user()->company_id;
        $staff = Staff::firstOrCreate($data_staff);
        return $staff;    
    }

    /**
     * Actualiza los datos
     *  editados de un staff
     */
    public function update(Request $request)
    {       
        $id = $request->input('id');
        $request->validate([
            'name'       => ['required'],
            'phone'      => ['required', 'numeric', 'max:999999999'],
            'email'      => ['required', 'email', 'unique:users,email,'.$id],
            'region_id'  => ['required'],
            'commune_id' => ['required'],
            'address'    => ['required'],
            'country'    => ['required'],
        ]);
        $staff = Staff::find($id);

        $staff->name       = $request->input('name');
        $staff->address    = $request->input('address'); 
        $staff->phone      = $request->input('phone');
        $staff->email      = $request->input('email');
        $staff->country    = $request->input('country');
        $staff->commune_id = $request->input('commune_id');
        $staff->save();
        return $staff;    
    }

    /**Devuelve los datos de un staff */
    public function getStaff (Request $request)
    {        
        return response(Staff::with('commune.region')->find($request->input('id')), 200);
    }

    /**Para eliminado lógico con softdeletes */
    public function status (Request $request)
    {
        $id = $request->input('id');
        $user = Staff::where('id', '=', $request->input('id'))->withTrashed()->first();        
        if ($user->deleted_at) {
            $user->restore();
        } else {
            $user->delete();
        }
        return response($user, 200);
    }
}

