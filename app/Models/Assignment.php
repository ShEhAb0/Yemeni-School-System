<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assignment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "assignments";
    protected $fillable = ['id' , 'teacher_id ',  'subject_id' ,'level_id' , 'term_id ' , 'due_date' , 'delivery_date' , 'mark' , 'status' ];

    public function teachersAssignments()
    {
        return $this->belongsTo('App\Models\Teacher' , 'teacher_id');
    }

    public function studentsAssignments()
    {
        return $this->belongsTo('App\Models\User' , 'student_id');

    }

    public function subjectsAssignments()
    {
        return $this->belongsTo('App\Models\Subject' , 'subject_id');

    }

    public function levelsAssignments()
    {
        return $this->belongsTo('App\Models\Grade' , 'level_id');

    }

    public function termsAssignments()
    {
        return $this->belongsTo('App\Models\Term' , 'term_id');

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
}
