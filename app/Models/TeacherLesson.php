<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherLesson extends Model
{
    protected $guarded = [];

    public function teacherSchedule()
    {
        return $this->belongsTo('\App\Models\TeacherSchedule');
    }
    
    public function subject()
    {
        return $this->belongsTo('\App\Models\Subject');
    }

    public function status()
    {
        return $this->belongsTo('\App\Models\Status');
    }

    public function alumnTeacherLessons()
    {
        return $this->hasMany('\App\Models\AlumnTeacherLesson');
    }

    public function delete()
    {
        $this->alumnTeacherLessons()->delete();
     
        return parent::delete();
    }

}
