<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $table = "exams";
    protected $fillable = ['id' , 'teacher_id ', 'exam_title' , 'level_id' ,'term_id' , 'subject_id ' , 'exam_time' , 'duration_m' , 'status' , 'total_ques' ];

}
