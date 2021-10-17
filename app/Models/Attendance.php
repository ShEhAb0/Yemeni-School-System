<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id' , 'subject_id ', 'level_id' , 'term_id' ,'lesson_id'  , 'lesson_creation_date' , 'view_date' , 'mark' , 'status' ];

    public function subjectsAttendances()
    {
        return $this->belongsTo('App\Models\Subject' , 'subject_id');

    }

    public function levelsAttendances()
    {
        return $this->belongsTo('App\Models\Grade' , 'level_id');

    }

    public function termsAttendances()
    {
        return $this->belongsTo('App\Models\Term' , 'term_id');

    }

    public function lessonsAttendances()
    {
        return $this->belongsTo('App\Models\Lesson' , 'lesson_id');

    }

}
