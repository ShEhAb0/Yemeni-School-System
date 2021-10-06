<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = "subjects";
    protected $fillable = ['id' , 'subject_name ', 'subject_code' , 'term_id' ,'code' , 'level_id ' ,'has_teacher' , 'status ' ];

    public function subjectsAssignments()
    {
        return $this->hasMany('App\Models\Subject' , 'subject_id');

    }
    public function subjectsAttendances()
    {
        return $this->hasMany('App\Models\Subject' , 'subject_id');

    }
    public function subjectsExams()
    {
        return $this->hasMany('App\Models\Subject' , 'subject_id');

    }
    public function subjectsLessons()
    {
        return $this->hasMany('App\Models\Subject' , 'subject_id');

    }


    public function levelsSubjects()
    {
        return $this->belongsTo('App\Models\Grade' , 'level_id');

    }
    public function termsSubjects()
    {
        return $this->belongsTo('App\Models\Term' , 'term_id');

    }
    public function teachersSubjects()
    {
        return $this->hasMany('App\Models\Subjects' , 'subjects_id');
    }

}
