<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRecord extends Model
{
    use HasFactory;
    protected $table = "students_records";
    protected $fillable = ['id' , 'student_id ', 'level_id' , 'term_id' ,'exam_marks' , 'assignment_marks ' ,'attendance_marks' , 'total_marks' , 'percentage' ];
}
