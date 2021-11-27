<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
class CourseController extends Controller
{
    public function index()
    {
        return view('master');
    }   
   
    public function getTableList (Request $request)
    {
      
        $list = Subject::orderBy('name', 'ASC')
                         ->get();
        return response($list, 200);
    }

    public function store(Request $request)
    {
        if ( $request->input('post_event') == 'store' ) {
            $request->validate([
                'name'       => ['required'],              
                'description'  => ['required'],
                'code'    => ['required'],
            ]);
           
            $data_course['name']        = $request->input('name');
            $data_course['description'] = $request->input('description');
            $data_course['code']        = $request->input('code');            
            
            $course = Subject::firstOrCreate($data_course);
            
            return $course;
        } else {
            $id = $request->input('id');
            $request->validate([
                'id'         => ['required'],
                'name'       => ['required','unique:subjects,name,'.$id],              
                'description' => ['required','unique:subjects,description,'.$id],            
                'code'       => ['required','unique:subjects,code,'.$id]          

            ]);
            $course              = Subject::find($id);
            $course->name        = $request->input('name');
            $course->description = $request->input('description');
            $course->code        = $request->input('code');            
            $course->save();
            return $course;
        }               
    }   

    public function status (Request $request)
    {
        $id = $request->input('id');
        $user = Subject::where('id', '=', $request->input('id'))->withTrashed()->first();        
        if ($user->deleted_at) {
            $user->restore();
        } else {
            $user->delete();
        }
        return response(Subject::all(), 200);
    }
}
