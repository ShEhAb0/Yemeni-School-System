<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

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

    public function answer()
    {
        return $this->hasOne('App\Models\StudentAssignment','assignment_id')->where('student_id',Auth::id());
    }

    public function assignmentComments()
    {
        return $this->hasMany('App\Models\AssignmentComment' , 'assignment_id');

    }
}
