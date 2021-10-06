<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = "questions";
    protected $fillable = ['id' , 'title ', 'choice_1' , 'choice_2' ,'choice_3' , 'choice_4 ' ,'correct_answer' , 'mark' , 'exam_id' ];

    public function questionsExams()
    {
        return $this->belongsTo('App\Models\Exam' , 'exam_id');

    }
}
