<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Models\TeacherLesson;
use App\Models\TeacherSchedule;
use App\Models\Status;
use App\Models\Subject;
use App\Models\AlumnTeacherLesson;
use App\Mail\NotifyLessonAdminMail;
use App\Mail\NotifyLessonAlumnMail;
use App\Mail\NotifyLessonTeacherMail;
use App\Mail\NotifyChangeLessonAdminMail;
use App\Mail\NotifyChangeLessonAlumnMail;
use App\Mail\NotifyChangeLessonTeacherMail;
use App\Mail\NotifyCancelLessonAlumnMail;


use Illuminate\Support\Facades\Mail;

class ScheduleController extends Controller
{
    public function index () 
    {
        return view('master');
    }

    public function getCalendar (Request $request) 
    {
        $current_month    = $request->input('current_month') != "" ? $request->input('current_month') : date('m');
        $current_year     = $request->input('current_year') != "" ? $request->input('current_year') : date('Y');
        $increment        = $request->input('increment');        
        $to_month         = $current_month;
        $to_year          = $current_year;       
        $_to              = $this->setDataForCalendar($increment, $current_month, $current_year );
        $rank_days        = $this->rankDayToMonth($_to['to_month'], $_to['to_year']);
        $data['year']     = $_to['to_year'];
        $data['month']    = $_to['to_month'];
        $data['teachers'] = User::whereIn('profile_id', Profile::WhereIn('name',['teacher', 'admin'])->get()->pluck('id')->toArray())->get();
        $data['subjects'] = Subject::all();
        $data['alumns']   = User::where('profile_id', '=', Profile::Where('name', '=', 'alumn')->first()->id)->get();
        $data['calendar'] = $this->paintCalendar($rank_days);

        return response($data, 200);
    }

    private function setDataForCalendar ($increment, $current_month, $current_year) 
    {
        $data['to_month'] = $current_month;
        $data['to_year']  = $current_year;
        if ($increment > 0) {
            if ($current_month == 12) {
                $data['to_month'] = 1;
                $data['to_year']  = (int)$current_year + 1;
            } else {
                $data['to_month'] = (int)$current_month + (int)$increment;
            }
        }
        if ($increment < 0)  {
            if ($current_month == 1) {
                $data['to_month'] = 12;
                $data['to_year']  = (int)$current_year - 1;
            } else {
                $data['to_month'] = (int)$current_month + (int)$increment;
            }
        }
        if ($increment == 0)  {
            $data['to_month'] = $current_month;
        } 
        return $data;
    }

    private function rankDayToMonth($month, $year) 
    {        
        $day                         = date("d", mktime(0,0,0, $month+1, 0, $year));  
        $data['first_day']           = date('Y-m-d', mktime(0,0,0, $month, 1, $year));
        $data['last_day']            = date('Y-m-d', mktime(0,0,0, $month, $day, $year));
        $data['position_first_date'] = $this->positionFirstDay($data['first_day']);
        return $data;
    }

    private function positionFirstDay ($date_first_day) 
    {     
        $year    = date("Y", strtotime( $date_first_day));
        $month   = date("m", strtotime( $date_first_day));
        $day     = date("d", strtotime( $date_first_day));      
        $dayWeek = date("w", mktime(0,0,0,$month,$day,$year));
        if($dayWeek==0)
            $dayWeek=7;
        return (int)$dayWeek;
    } 

    private function paintCalendar ($rank_days) 
    {
        $month         = [];
        $weeks         = $this->getWeeks($rank_days);
        $last_day      = date("d", strtotime( $rank_days['last_day']));
        $day_strtotime = "";
        $init          = 'false';
        $count         = 0;
        foreach ($weeks as $key_week => $value_week) {
            foreach ($value_week as $key => $value) {
                $count ++;
                if ($key_week == 1) {                      
                    if (isset($value['day']) && $init == 'false') {
                        $day_strtotime          = strtotime($value['day']);
                        $weeks[$key_week][$key] = ['day' => date("Y-m-d",  $day_strtotime), "has" => $this->hasSchedule(date("Y-m-d",  $day_strtotime)) ];
                        $init                   = 'true';
                        $count                  = 1;
                    } 
                    if (!isset($value['day']) && $init == 'true') {
                        $day_strtotime          = strtotime ( '+1 day' , $day_strtotime ) ;
                        $weeks[$key_week][$key] = ['day' => date("Y-m-d",  $day_strtotime), "has" => $this->hasSchedule(date("Y-m-d",  $day_strtotime))]; 
                    }
                } else {                      
                    if ($last_day >= $count) {
                        $day_strtotime          = strtotime ( '+1 day', $day_strtotime );
                        $weeks[$key_week][$key] = ['day' => date("Y-m-d",  $day_strtotime), "has" => $this->hasSchedule(date("Y-m-d",  $day_strtotime)) ];      
                    }
                }
            }
        }
        return $weeks;
    }

    private function getWeeks ($rank_days) 
    {
        $weeks     = [];
        $init_week = 'false';
        $init_date = $rank_days['first_day'];
        for ($i = 1; $i <= 7; $i++) {
            if ($init_week == 'false') {                
                $weeks[$i][1] = $rank_days['position_first_date'] == 1 ? ['day'=>$init_date ] : "" ;
                $weeks[$i][2] = $rank_days['position_first_date'] == 2 ? ['day'=>$init_date ] : "" ;
                $weeks[$i][3] = $rank_days['position_first_date'] == 3 ? ['day'=>$init_date ] : "" ;
                $weeks[$i][4] = $rank_days['position_first_date'] == 4 ? ['day'=>$init_date ] : "" ;
                $weeks[$i][5] = $rank_days['position_first_date'] == 5 ? ['day'=>$init_date ] : "" ;
                $weeks[$i][6] = $rank_days['position_first_date'] == 6 ? ['day'=>$init_date ] : "" ;
                $weeks[$i][7] = $rank_days['position_first_date'] == 7 ? ['day'=>$init_date ] : "" ;
                $init_week = 'true';
            } else {
                $weeks[$i][1] = [] ;
                $weeks[$i][2] = [] ;
                $weeks[$i][3] = [] ;
                $weeks[$i][4] = [] ;
                $weeks[$i][5] = [] ;
                $weeks[$i][6] = [] ;
                $weeks[$i][7] = [] ;
            }            
        }

        return $weeks;
    }

    private function hasSchedule ($day)
    {
        $lesson = TeacherLesson::where('date', '=', $day)->count();
        if ($lesson > 0) { return true;} else {return false;}  
    }

    public function postLesson (Request $request) 
    {       
        $validatedData = $request->validate([
            'since'         => ['required'],
            'until'         => ['required'],
            'zoom_link'     => ['required'],
            'teacher'       => ['required'],
            'subject'       => ['required'],
            'lesson_alumns' => ['required'],
            'date'          => ['required']
        ]);
        //validando horas ingresadas
        $data_time_since = $request->input('date') .' '.$request->input('since');
        $data_time_since = strtotime($data_time_since);
        $data_time_until = $request->input('date') .' '.$request->input('until');
        $data_time_until = strtotime($data_time_until);
        if ($data_time_since > $data_time_until) {
            return response(['errors'=> ['since' =>  ['El Inicio no debe ser mayor al Fin.'],
                                         'until' =>  ['El Inicio no debe ser mayor al Fin.']]], 422);
        }
        $teacher_schedule = TeacherSchedule::firstOrCreate(
           [
               'date'       => $request->input('date'),
               'teacher_id' => $request->input('teacher')['id']
           ]
        );
       
        //validar rango de hora de ingreso 
        $validate_time_lesson_since = TeacherLesson::whereBetween('since_time', [date( 'H:i:s' , $data_time_since), date( 'H:i:s' , $data_time_until) ])
                                              ->where('teacher_schedule_id', '=', $teacher_schedule->id)
                                              ->where('date', '=', $request->input('date'))
                                              ->count();
        $validate_time_lesson_until = TeacherLesson::whereBetween('until_time', [date( 'H:i:s' , $data_time_since), date( 'H:i:s' , $data_time_until) ])
                                              ->where('teacher_schedule_id', '=', $teacher_schedule->id)
                                              ->where('date', '=', $request->input('date'))
                                              ->count();
        if ($validate_time_lesson_since > 0 ) {
            return response(['errors'=> [
                                         'since'   =>  ['Ya existe un bloque en el rango.'],
                                         'teacher' =>  ['Ya existe un bloque en el rango.']]], 422);
        }
        if ($validate_time_lesson_until > 0) {
            TeacherSchedule::where('id', '=', $teacher_schedule->id)->delete();
            return response(['errors'=> ['until'   =>  ['Ya existe un bloque en el rango.'],                                         
                                         'teacher' =>  ['Ya existe un bloque en el rango.']]], 422);
        }

        $teacher_lesson = TeacherLesson::updateOrCreate(
            [
                'date'                => $request->input('date'),
                'since_time'          => $request->input('since'),
                'until_time'          => $request->input('until'),
                'teacher_schedule_id' => $teacher_schedule->id,
            ],
            [
                'subject_id'          => $request->input('subject')['id'],
                'link_zoom'           => $request->input('zoom_link'),
                'status_id'           => Status::where('type', '=', 'LESSONS')->where('code', '=', 'OPENED')->first()->id
            ]
        );
        $date = $request->input('date');
        AlumnTeacherLesson::where('teacher_lesson_id', '=', $teacher_lesson->id)->delete();
        foreach ($request->input('lesson_alumns') as $alumn) {
            $validate_alumn_lesson = User::select('id', 'name')
                                            ->with(['teacherLessons' => function ($query) use ($data_time_since, $data_time_until, $date){
                                                $query->whereBetween('since_time', [[date( 'H:i:s' , $data_time_since), date( 'H:i:s' , $data_time_until) ]]);
                                                $query->where('date', $date);
                                            }])
                                            ->where('id', '=', $alumn['id'])                      
                                            ->first();                                            
            if (count($validate_alumn_lesson->teacherLessons) > 0) {
                return response(['errors'=> ['lesson_alumns' =>  ['Uno o más aprendices ya estan en otra Taller a esta fecha y hora.']
                                             ]], 422); 
            }
            $validate_alumn_lesson = User::select('id', 'name')
                                            ->with(['teacherLessons' => function ($query) use ($data_time_since, $data_time_until, $date){
                                                $query->whereBetween('until_time', [[date( 'H:i:s' , $data_time_since), date( 'H:i:s' , $data_time_until) ]]);
                                                $query->where('date', $date);
                                            }])
                                            ->where('id', '=', $alumn['id'])                      
                                            ->first();                                            
            if (count($validate_alumn_lesson->teacherLessons) > 0) {
               
                return response(['errors'=> ['lesson_alumns' =>  ['Uno o más aprendices ya estan en otro Taller a esta fecha y hora.']
                                             ]], 422); 
            }
        }
        foreach ($request->input('lesson_alumns') as $alumn) {        
            AlumnTeacherLesson::create([
                'teacher_lesson_id' => $teacher_lesson->id,
                'alumn_id' => $alumn['id']
            ]);
        }

        $this->insertRepeatDay($request); 

        $teacher_schedule = TeacherSchedule::with([
                                                    'teacherLessons' => function ($query) {
                                                        $query->orderBy('since_time', 'asc');
                                                    },
                                                    'teacherLessons.alumnTeacherLessons.alumn',
                                                    'teacherLessons.status',
                                                    'teacherLessons.subject',
                                                    'teacher'
                                                ]
                                                 )->where('date', '=', $request->input('date'))->get();
        $alumns_to_mail = [];
        foreach ($request->input('lesson_alumns') as $alumn) {
            $alumn    =  User::with('attorney')->where('id', '=', $alumn['id'])->first();
            $attorney =  User::find($alumn->attorney_id);

            $alumns_to_mail[] = $alumn;
            $data_mail = [
                'since'       => $request->input('since'),
                'until'       => $request->input('until'),
                'teacher'     => $request->input('teacher'),
                'subject'     => $request->input('subject'),
                'date'        => $request->input('date'),
                'alumn'       => $alumn,
                'attorney'    => $attorney,
                'list_days_to_repeat' => $request->input('list_days_to_repeat'),
            ];
             Mail::to($attorney->email)->send(new NotifyLessonAlumnMail($data_mail));
        }    




        $data_mail = [
            'since'         => $request->input('since'),
            'until'         => $request->input('until'),
            'zoom_link'     => $request->input('zoom_link'),
            'teacher'       => $request->input('teacher'),
            'subject'       => $request->input('subject'),
            'lesson_alumns' => $alumns_to_mail,
            'date'          => $request->input('date'),
            'list_days_to_repeat'   => $request->input('list_days_to_repeat'),
        ];        
        // Mail::to('francisco.rios.castillo2@gmail.com')->send(new NotifyLessonAdminMail($data_mail));
        Mail::to('paulagarcialorca@virtualafterschool.cl')->send(new NotifyLessonAdminMail($data_mail));

        Mail::to($request->input('teacher')['email'])->send(new NotifyLessonTeacherMail($data_mail));
        return response($teacher_schedule, 200);        
    } 

    private function insertRepeatDay ($request) 
    {
        
        foreach ($request->input('list_days_to_repeat') as $day) {
            $teacher_schedule = TeacherSchedule::firstOrCreate(
                [
                    'date'       => $day,
                    'teacher_id' => $request->input('teacher')['id']
                ]
             );
             $teacher_lesson = TeacherLesson::updateOrCreate(
                [
                    'date'                => $day,
                    'since_time'          => $request->input('since'),
                    'until_time'          => $request->input('until'),
                    'teacher_schedule_id' => $teacher_schedule->id,
                ],
                [
                    'subject_id'          => $request->input('subject')['id'],
                    'link_zoom'           => $request->input('zoom_link'),
                    'status_id'           => Status::where('type', '=', 'LESSONS')->where('code', '=', 'OPENED')->first()->id
                ]
            );
            foreach ($request->input('lesson_alumns') as $alumn) {        
                AlumnTeacherLesson::create([
                    'teacher_lesson_id' => $teacher_lesson->id,
                    'alumn_id' => $alumn['id']
                ]);
            }
        }
        return true;
      
    } 

    public function getDayLessons (Request $request) 
    {             
      
        $teacher_schedule = TeacherSchedule::with(
                            [
                                'teacherLessons' => function ($query) {
                                    $query->orderBy('since_time', 'asc');
                                },
                                'teacherLessons.alumnTeacherLessons.alumn',
                                'teacherLessons.status',
                                'teacherLessons.subject',
                                'teacher'
                            ]
                            )->where('date', '=', $request->input('selected_day'))->get();
        return response($teacher_schedule, 200);
        
    } 

    public function deleteLesson (Request $request) 
    {
        $lesson           = TeacherLesson::find($request->input('lesson_id'));
        $teacher_schedule = TeacherSchedule::find($lesson->teacher_schedule_id);
        AlumnTeacherLesson::where('teacher_lesson_id', '=', $lesson->id)->delete();
        $lesson->delete();
        
        $teacher_lessons = TeacherLesson::where('teacher_schedule_id', '=', $teacher_schedule->id)
                                        ->where('date','=',$request->input('date'))->count();
        if ($teacher_lessons == 0) {
            $teacher_schedule->delete();
        } 
        
        return response( $lesson, 200);
    }

    public function addOtherAlumn (Request $request) 
    {
        $lesson = AlumnTeacherLesson::where('teacher_lesson_id', '=', $request->input('lesson'))
                                    ->where('alumn_id', '=', $request->input('alumn'))
                                    ->count();   
        if ($lesson > 0) {
            return response(['errors'=> ['other_alumn' =>  ['El alumno ya se encuentra en esta clase']
                                            ]], 422); 
        } 
        $date = $request->input('date');
        $data_time_since = $request->input('date') .' '.$request->input('since');
        $data_time_since = strtotime($data_time_since);
        $data_time_until = $request->input('date') .' '.$request->input('until');
        $data_time_until = strtotime($data_time_until);
        $validate_alumn_lesson = User::select('id', 'name')
                                ->with(['teacherLessons' => function ($query) use ($data_time_since, $data_time_until, $date){
                                    $query->whereBetween('since_time', [[date( 'H:i:s' , $data_time_since), date( 'H:i:s' , $data_time_until) ]]);
                                    $query->where('date', $date);
                                }])
                                ->where('id', '=', $request->input('alumn'))                      
                                ->first();                                            
        if (count($validate_alumn_lesson->teacherLessons) > 0) {
            return response(['errors'=> ['other_alumn' =>  ['El alumno ya esta en otro Taller a esta fecha y hora.']
                                            ]], 422); 
        }
        $validate_alumn_lesson = User::select('id', 'name')
                                        ->with(['teacherLessons' => function ($query) use ($data_time_since, $data_time_until, $date){
                                            $query->whereBetween('until_time', [[date( 'H:i:s' , $data_time_since), date( 'H:i:s' , $data_time_until) ]]);
                                            $query->where('date', $date);
                                        }])
                                        ->where('id', '=', $request->input('alumn'))                      
                                        ->first();                                            
        if (count($validate_alumn_lesson->teacherLessons) > 0) {
            return response(['errors'=> ['other_alumn' =>  ['El alumno ya esta en otro Taller a esta fecha y hora.']
                                            ]], 422); 
        }

        AlumnTeacherLesson::create([
            "teacher_lesson_id" => $request->input('lesson'),
            "alumn_id" => $request->input('alumn')
        ]);


        return response( 'true', 200);
    }

    public function changeHourLesson (Request $request) {
        $date = $request->input('date');
        $data_time_since = $request->input('date') .' '.$request->input('since');
        $data_time_since = strtotime($data_time_since);
        $data_time_until = $request->input('date') .' '.$request->input('until');
        $data_time_until = strtotime($data_time_until);
        if ($data_time_since > $data_time_until) {
            return response(['errors'=> ['other_since' =>  ['El Inicio no debe ser mayor al Fin.'],
                                         'other_until' =>  ['El Inicio no debe ser mayor al Fin.']]], 422);
        }

        $teacher_lesson   = TeacherLesson::find($request->input('lesson'));
        $teacher_schedule = TeacherSchedule::find($teacher_lesson->teacher_schedule_id);

        $validate_time_lesson_since = TeacherLesson::whereBetween('since_time', [date( 'H:i:s' , $data_time_since), date( 'H:i:s' , $data_time_until) ])
                                                    ->where('teacher_schedule_id', '=', $teacher_schedule->id)
                                                    ->where('date', '=', $request->input('date'))
                                                    ->where('id', "<>", $request->input('lesson'))
                                                    ->count();
        $validate_time_lesson_until = TeacherLesson::whereBetween('until_time', [date( 'H:i:s' , $data_time_since), date( 'H:i:s' , $data_time_until) ])
                                                    ->where('teacher_schedule_id', '=', $teacher_schedule->id)
                                                    ->where('date', '=', $request->input('date'))
                                                    ->where('id', "<>", $request->input('lesson'))
                                                    ->count();
        if ($validate_time_lesson_since > 0 ) {
        return response(['errors'=> [
                            'other_since'   =>  ['Ya existe un bloque en el rango.'],
                        ]], 422);
        }
        if ($validate_time_lesson_until > 0) {
        return response(['errors'=> ['other_until'   =>  ['Ya existe un bloque en el rango.'],                                         
                                    ]], 422);
        }

        $alumns_lesson = AlumnTeacherLesson::where('teacher_lesson_id', '=', $teacher_lesson->id)->get();
        foreach ($alumns_lesson as $alumn) {
            $validate_alumn_lesson = User::select('id', 'name')
                                            ->with(['teacherLessons' => function ($query) use ($data_time_since, $data_time_until, $date){
                                                $query->whereBetween('since_time', [[date( 'H:i:s' , $data_time_since), date( 'H:i:s' , $data_time_until) ]]);
                                                $query->where('date', $date);
                                            }])
                                            ->where('id', '=', $alumn->alumn_id)                      
                                            ->first();   
            if (count($validate_alumn_lesson->teacherLessons) > 0) {
                return response(['errors'=> ['other_since' =>  ['Uno o más aprendices ya estan en otra Taller a esta fecha y hora.']
                                             ]], 422); 
            }
            $validate_alumn_lesson = User::select('id', 'name')
                                            ->with(['teacherLessons' => function ($query) use ($data_time_since, $data_time_until, $date){
                                                $query->whereBetween('until_time', [[date( 'H:i:s' , $data_time_since), date( 'H:i:s' , $data_time_until) ]]);
                                                $query->where('date', $date);
                                            }])
                                            ->where('id', '=', $alumn->alumn_id)                      
                                            ->first();                                            
            if (count($validate_alumn_lesson->teacherLessons) > 0) {
                return response(['errors'=> ['other_until' =>  ['Uno o más aprendices ya estan en otro Taller a esta fecha y hora.']
                                             ]], 422); 
            }
        }
      
        $reinsert_teacher_schedule = TeacherSchedule::where('teacher_id', '=',$teacher_schedule->teacher_id)
                                                    ->where('date', '=', $request->input('old_date'))
                                                    ->first();
       
        
        $validate_count_lessons = TeacherLesson::where('teacher_schedule_id', '=', $reinsert_teacher_schedule->id)->count();
        if ($validate_count_lessons > 1) {
            $reinsert_teacher_schedule = TeacherSchedule::firstOrCreate([
                'date' => $request->input('date'),
                'teacher_id' =>  $reinsert_teacher_schedule->teacher_id
            ]);

        } else {
            $reinsert_teacher_schedule->date =  $request->input('date');
            $reinsert_teacher_schedule->save();
        }
        $teacher_lesson->teacher_schedule_id = $reinsert_teacher_schedule->id; 
        $teacher_lesson->date = $request->input('date'); 
        $teacher_lesson->since_time = $request->input('since');
        $teacher_lesson->until_time = $request->input('until');
        $teacher_lesson->save();

        $data_mail = [
            'since'     => $request->input('since'),
            'until'     => $request->input('until'),                
            'date'      => $request->input('date'),
            'old_since' => $request->input('old_since'),
            'old_until' => $request->input('old_until'),
            'old_date'  => $request->input('old_date')
        ];
        $alumns_to_mail = [];
        foreach ($alumns_lesson as $alumn) {
            $alumn    =  User::with('attorney')->where('id', '=', $alumn->alumn_id)->first();
            $attorney =  User::find($alumn->attorney_id);
            $alumns_to_mail[] = $alumn; 
            Mail::to($attorney->email)->send(new NotifyChangeLessonAlumnMail($data_mail));
        }
              
        Mail::to('francisco.rios.castillo2@gmail.com')->cc('paulagarcialorca@virtualafterschool.cl')->send(new NotifyChangeLessonAdminMail($data_mail));
        $teacher = User::find($teacher_schedule->teacher_id);
        Mail::to( $teacher->email)->send(new NotifyChangeLessonTeacherMail($data_mail));
        return response($teacher_schedule, 200); 
    }

    public function deleteAlumnLesson (Request $request) 
    {
        $lesson = AlumnTeacherLesson::where('teacher_lesson_id', '=', $request->input('lesson'))
                                        ->where('alumn_id', '=', $request->input('alumn'))
                                        ->delete();   
        return response( $lesson, 200);
    }

    public function validateDayToRepeat (Request $request) 
    {
        
        $teacher_schedule = TeacherSchedule::with('teacherLessons')
                                            ->where('teacher_id', '=', $request->input('teacher'))
                                            ->where('date', '=', $request->input('day'))
                                            ->first();
     
        $data_time_since = $request->input('day') .' '.$request->input('since');
        $data_time_since = strtotime($data_time_since);
        $data_time_until = $request->input('day') .' '.$request->input('until');
        $data_time_until = strtotime($data_time_until);
        $day   = $request->input('day');

        $validate = ['validate' => true, 'msg_false' => ''];   
                                      
        if ( !empty($teacher_schedule) ) {
            $validate_time_lesson_since = TeacherLesson::whereBetween('since_time', [date( 'H:i:s' , $data_time_since), date( 'H:i:s' ,  $data_time_until) ])
                                              ->where('teacher_schedule_id', '=', $teacher_schedule->id)
                                              ->where('date', '=', $day)
                                              ->count();
            $validate_time_lesson_until = TeacherLesson::whereBetween('until_time', [date( 'H:i:s' ,  $data_time_since), date( 'H:i:s' ,  $data_time_until  ) ])
                                                ->where('teacher_schedule_id', '=', $teacher_schedule->id)
                                                ->where('date', '=', $day)
                                                ->count();
            if ($validate_time_lesson_since > 0 ) {
                $validate = ['validate' => false, 'msg_false' => 'Tope de horario Inicio del Profesional seleccionado.'];  
            }
            if ($validate_time_lesson_until > 0) {
                $validate = ['validate' => false, 'msg_false' => 'Tope de horario Fin del Profesional seleccionado.']; 
            }
        } 

        foreach ($request->input('lesson_alumns') as $alumn) {
            $validate_alumn_lesson = User::select('id', 'name')
                                            ->with(['teacherLessons' => function ($query) use ($data_time_since, $data_time_until, $day){
                                                $query->whereBetween('since_time', [[date( 'H:i:s' , $data_time_since), date( 'H:i:s' , $data_time_until) ]]);
                                                $query->where('date', $day);
                                            }])
                                            ->where('id', '=',$alumn['id'])                      
                                            ->first();                                            
            if (count($validate_alumn_lesson->teacherLessons) > 0) {
                $validate = ['validate' => false, 'msg_false' => 'Tope de horario Inicio del Alumno '. $alumn['name'] .'.']; 

            }
            $validate_alumn_lesson = User::select('id', 'name')
                                            ->with(['teacherLessons' => function ($query) use ($data_time_since, $data_time_until, $day){
                                                $query->whereBetween('until_time', [[date( 'H:i:s' , $data_time_since), date( 'H:i:s' , $data_time_until) ]]);
                                                $query->where('date', $day);
                                            }])
                                            ->where('id', '=',$alumn['id'])                      
                                            ->first();                                            
            if (count($validate_alumn_lesson->teacherLessons) > 0) {
                $validate = ['validate' => false, 'msg_false' => 'Tope de horario Fin del Alumno '. $alumn['name'] .'.']; 

            }
        }
        return response( $validate, 200);    
    }

    public function validateAlumnInLesson (Request $request) 
    {
      
        $date = $request->input('date');
        $data_time_since = $request->input('date') .' '.$request->input('since');
        $data_time_since = strtotime($data_time_since);
        $data_time_until = $request->input('date') .' '.$request->input('until');
        $data_time_until = strtotime($data_time_until);
        $validate_alumn_lesson = User::select('id', 'name')
                                ->with(['teacherLessons' => function ($query) use ($data_time_since, $data_time_until, $date){
                                    $query->whereBetween('since_time', [[date( 'H:i:s' , $data_time_since), date( 'H:i:s' , $data_time_until) ]]);
                                    $query->where('date', $date);
                                }])
                                ->where('id', '=', $request->input('alumn'))                      
                                ->first();                                            
        if (count($validate_alumn_lesson->teacherLessons) > 0) {
            return response(['errors'=> ['since' =>  ['El alumno ya esta en otro Taller a esta fecha y hora.']
                                            ]], 422); 
        }
        $validate_alumn_lesson = User::select('id', 'name')
                                        ->with(['teacherLessons' => function ($query) use ($data_time_since, $data_time_until, $date){
                                            $query->whereBetween('until_time', [[date( 'H:i:s' , $data_time_since), date( 'H:i:s' , $data_time_until) ]]);
                                            $query->where('date', $date);
                                        }])
                                        ->where('id', '=', $request->input('alumn'))                      
                                        ->first();                                            
        if (count($validate_alumn_lesson->teacherLessons) > 0) {
            return response(['errors'=> ['until' =>  ['El alumno ya esta en otro Taller a esta fecha y hora.']
                                            ]], 422); 
        }

      
        return response( 'true', 200);
    }

    public function changeZoomLink (Request $request) 
    {
        $teacher_lesson = TeacherLesson::find($request->input('lesson'));
        $other_zoom     = $request->input('zoom');
        $teacher_lesson->link_zoom = $other_zoom;
        $teacher_lesson->save();
        return response($teacher_lesson, 200); 
    }

    public function cancelLesson (Request $request) 
    {
        $lesson           = TeacherLesson::find($request->input('lesson_id'));
        $teacher_schedule = TeacherSchedule::find($lesson->teacher_schedule_id);
        $alumns           = AlumnTeacherLesson::where('teacher_lesson_id', '=', $lesson->id)->get();
        $teacher_lessons  = TeacherLesson::where('teacher_schedule_id', '=', $teacher_schedule->id)
                                        ->where('date','=',$request->input('date'))
                                        ->first();
        $teacher_lessons->status_id = Status::where('type', '=', 'LESSONS')->where('code', '=', 'CANCELED')->first()->id;
        
        foreach ($alumns as $alumn) {
            $alumn    =  User::with('attorney')->where('id', '=', $alumn['alumn_id'])->first();
            $attorney =  User::find($alumn->attorney_id);
            $alumns_to_mail[] = $alumn;
            $data_mail = [
                'since'       => $teacher_lessons->since_time,
                'until'       => $teacher_lessons->until_time,
                'teacher'     => $request->input('teacher'),
                'subject'     => $request->input('subject'),
                'date'        => $request->input('date'),
                'alumn'       => $alumn,
                'attorney'    => $attorney,
                'list_days_to_repeat' => $request->input('list_days_to_repeat'),
            ];
          
            Mail::to($attorney->email)->send(new NotifyCancelLessonAlumnMail($data_mail));
            $teacher_lessons->save();
        }    
        
        return response( $lesson, 200);
    }
}
