<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAnswer extends Model
{
    use HasFactory;
    protected $table = "students_answers";
    protected $fillable = ['id' , 'student_id ', 'level_id' , 'term_id' ,'subject_id' , 'exam_id ' ,'question_id' , 'student_answer' , 'correct_answer' , 'mark' , 'status' ];

}
