<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Teacher extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "teachers";
    protected $fillable = ['id' , 'teacher_name ', 'username' , 'email' ,'password' , 'gender ' ,'phone' , 'address' , 'image' , 'teacher_education_certificate' ,'teacher_id_or_passport', 'status' ];

    public function teachersAssignments()
    {
        return $this->hasMany('App\Models\Teacher' , 'teacher_id');

    }
    public function teachersExams()
    {
        return $this->hasMany('App\Models\Teacher' , 'teacher_id');

    }
    public function teachersTeachers()
    {
        return $this->hasMany('App\Models\Teacher' , 'teacher_id');
    }

}


