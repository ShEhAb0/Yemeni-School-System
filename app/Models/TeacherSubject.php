<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherSubject extends Model
{
    use HasFactory;
    protected $table = "teacher_subjects";
    protected $fillable = ['id' , 'teacher_id ', 'subject_id' ,'level_id' ,  'assign_date' , 'status' ];
}
