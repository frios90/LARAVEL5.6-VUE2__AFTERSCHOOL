<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    protected $guarded = [];
    use SoftDeletes;

    public function attorney()
    {
        return $this->belongsTo('\App\Models\User', 'attorney_id');
    }

    public function commune()
    {
        return $this->belongsTo('\App\Models\Commune');
    }

    public function requests()
    {
        return $this->hasMany('\App\Models\Request');
    }

    public function profile()
    {
        return $this->belongsTo('\App\Models\Profile');
    }

    public function alumns()
    {
        return $this->hasMany('\App\Models\User', 'attorney_id');
    }

    public function lessons()
    {
        return $this->hasMany('\App\Models\AlumnTeacherLesson', 'alumn_id');
    }

    public function teacherLessons()
    {
        return $this->belongsToMany('\App\Models\TeacherLesson', 'alumn_teacher_lessons', 'alumn_id', 'teacher_lesson_id');
    }

}
