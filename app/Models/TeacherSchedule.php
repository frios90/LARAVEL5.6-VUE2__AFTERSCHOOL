<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherSchedule extends Model
{
    protected $guarded = [];

    public function teacherLessons()
    {
        return $this->hasMany('\App\Models\TeacherLesson');
    }

    public function teacher()
    {
        return $this->belongsTo('\App\Models\User', 'teacher_id');
    }

}
