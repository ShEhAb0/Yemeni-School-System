<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherSubject extends Model
{
    use HasFactory;
    protected $table = "teacher_subjects";
    public $timestamps = false;
    protected $fillable = ['id' , 'teacher_id ', 'subject_id' ,'level_id' ,  'assign_date' , 'status' ];

    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher' , 'teacher_id');
    }
    public function subject()
    {
        return $this->belongsTo('App\Models\Subject' , 'subject_id');
    }
    public function grade()
    {
        return $this->belongsTo('App\Models\Grade' , 'level_id');
    }

    public function term()
    {
        return $this->belongsTo('App\Models\Term' , 'term_id');
    }

}
