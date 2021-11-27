<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlumnTeacherLesson extends Model
{
    protected $guarded = [];

    public function alumn()
    {
        return $this->belongsTo('\App\Models\User', 'alumn_id');
    }

    public function teacherLesson()
    {
        return $this->belongsTo('\App\Models\TeacherLesson', 'teacher_lesson_id');
    }
}
