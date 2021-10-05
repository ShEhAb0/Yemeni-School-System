<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentExam extends Model
{
    use HasFactory;
    protected $table = "students_exams";
    protected $fillable = ['id' , 'student_id ', 'level_id' , 'term_id' ,'subject_id' , 'exam_id ' ,'total_mark'  , 'status' ];
}
