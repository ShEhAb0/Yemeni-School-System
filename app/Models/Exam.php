<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $table = "exams";
    protected $fillable = ['id' , 'teacher_id ', 'exam_title' , 'level_id' ,'term_id' , 'subject_id ' , 'exam_time' , 'duration_m' , 'status' , 'total_ques' ];

    public function teachersExams()
    {
        return $this->belongsTo('App\Models\Teacher' , 'teacher_id');

    }

    public function levelsExams()
    {
        return $this->belongsTo('App\Models\Grade' , 'level_id');

    }

    public function termsExams()
    {
        return $this->belongsTo('App\Models\Term' , 'term_id');

    }

    public function subjectsExams()
    {
        return $this->belongsTo('App\Models\Subject' , 'subject_id');

    }

    public function questionsExams()
    {
        return $this->hasMany('App\Models\Exam' , 'exam_id');

    }
}
