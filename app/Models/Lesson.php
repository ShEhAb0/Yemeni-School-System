<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;


    protected $table = "lessons";
    protected $fillable = ['id' , 'title ', 'description' , 'subject_id' ,'term_id' , 'level_id' , 'total_likes', 'status'  ];

    public function lessonsAttendances()
    {
        return $this->hasMany('App\Models\Lesson' , 'lesson_id');

    }

    public function subjectsLessons()
    {
        return $this->belongsTo('App\Models\Subject' , 'subject_id');

    }

    public function termsLessons()
    {
        return $this->belongsTo('App\Models\Term' , 'term_id');

    }
    public function levelsLessons()
    {
        return $this->belongsTo('App\Models\Grade' , 'level_id');

    }

    public function lessonsComments()
    {
        return $this->hasMany('App\Models\Lesson' , 'lesson_id');

    }

}
