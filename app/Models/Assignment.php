<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $table = "assignments";
    protected $fillable = ['id' , 'teacher_id ', 'student_id' , 'subject_id' ,'level_id' , 'term_id ' , 'due_date' , 'delivery_date' , 'mark' , 'status' ];

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
}
