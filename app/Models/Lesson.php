<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory ,  SoftDeletes;



    protected $table = "lessons";
    protected $fillable = ['id' , 'title ', 'description' , 'subject_id' ,'term_id' , 'level_id' , 'total_likes', 'status'  ];


    public function terms()
    {
        return $this->belongsTo('App\Models\Term' , 'term_id');
    }
    public function grades()
    {
        return $this->belongsTo('App\Models\Grade' , 'grade_id');
    }
    public function subjects()
    {
        return $this->belongsTo('App\Models\Subject' , 'subject_id');
    }
    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher' , 'teacher_id');
    }

    public function video()
    {
        return $this->hasOne('App\Models\Attachment' , 'type_id')->where('type',1)->where('attachment_type',1);
    }

    public function photo()
    {
        return $this->hasOne('App\Models\Attachment' , 'type_id')->where('type',1)->where('attachment_type',2);
    }

    public function doc()
    {
        return $this->hasOne('App\Models\Attachment' , 'type_id')->where('type',1)->where('attachment_type',3);
    }


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

    public function lessonComments()
    {
        return $this->hasMany('App\Models\LessonComment' , 'lesson_id');

    }

}
