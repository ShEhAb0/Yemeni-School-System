<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAssignment extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function subjects()
    {
        return $this->belongsTo('App\Models\Subject' , 'subject_id');
    }

    public function assignment()
    {
        return $this->belongsTo('App\Models\Assignment' , 'assignment_id');
    }
    public function student()
    {
        return $this->belongsTo('App\Models\User' , 'student_id');
    }
}
