<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\TeacherLesson;
use App\Models\TeacherSchedule;
use App\Models\User;

use Auth;
class DashboardController extends Controller
{
    public function getDashboard () 
    {
        return view('master');
    }

    public function hasAccessPermissions (Request $request) 
    {
        $menu = $request->input('menu');
        $profile = Profile::where('id', '=', Auth::user()->profile_id)->first()->name;
        $allow = [
            'd_admin'   => ['status' => true],
            'd_teacher' => ['status' => true],
            'd_alumn'   => ['status' => true],            
        ];
        switch ($profile) {
            case 'admin' :
                $allow = [
                    'd_admin'   => ['status' => true],
                    'd_teacher' => ['status' => true],
                    'd_alumn'   => ['status' => false],            
                ];
            break;
            case 'teacher' : 
                $allow = [
                    'd_admin'   => ['status' => false],
                    'd_teacher' => ['status' => true],
                    'd_alumn'   => ['status' => false],            
                ];         
            break;
            case 'attorney' : 
                $allow = [
                    'd_admin'   => ['status' => false],
                    'd_teacher' => ['status' => false],
                    'd_alumn'   => ['status' => true],            
                ];         
            break;
            case 'alumn' : 
                $allow = [
                    'd_admin'   => ['status' => false],
                    'd_teacher' => ['status' => false],
                    'd_alumn'   => ['status' => true],            
                ];         
            break;

        }
        return response()->json($allow);


    }

    public function getNextClass () {
        $user = Auth::user();
        $profile = Profile::find($user->profile_id);
        $next_lesson  = "";
        $current_time = date('Y-m-d H:i:s');
        $less_minutes = strtotime ( '-15 minute' , strtotime ($current_time) ) ;
        $more_minutes = strtotime ( '+10 minute' , strtotime ($current_time) ) ;

        $less_minutes = date ( 'H:i:s' , $less_minutes); 
        $more_minutes = date ( 'H:i:s' , $more_minutes) < $less_minutes ? '23:59:59' : date ( 'H:i:s' , $more_minutes);

        if ($profile->name == 'admin' || $profile->name == 'teacher') {
            $next_lesson  = TeacherLesson::with('alumnTeacherLessons.alumn.attorney')
                                        ->whereHas('teacherSchedule', function ($query) use ($user)  {
                                            $query->where('teacher_id', $user->id);
                                        })
                                        ->whereBetween('since_time', [$less_minutes, $more_minutes])
                                        ->where('date', '=', date('Y-m-d'))
                                        ->orderBy('since_time', 'asc')
                                        ->first();
            \Log::debug($next_lesson);
        } else {
            $next_lesson = User::select('id', 'name')
                            ->with(['teacherLessons' => function ($query) use ($less_minutes, $more_minutes){
                                $query->whereBetween('since_time', [$less_minutes, $more_minutes]);
                                $query->where('date', date('Y-m-d'));
                                $query->first();
                            }])
                            ->where('attorney_id', '=', $user->id)                      
                            ->get();

        }
        return response($next_lesson , 200);
    }
    
}
