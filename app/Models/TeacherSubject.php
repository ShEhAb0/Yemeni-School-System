<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherSubject extends Model
{
    use HasFactory;
    protected $table = "teacher_subjects";
    protected $fillable = ['id' , 'teacher_id ', 'subject_id' ,'level_id' ,  'assign_date' , 'status' ];

    public function teachersTeachers()
    {
        return $this->belongsTo('App\Models\Teacher' , 'teacher_id');
    }
    public function teachersSubjects()
    {
        return $this->belongsTo('App\Models\Subjects' , 'subjects_id');
    }
    public function teachersLevels()
    {
        return $this->belongsTo('App\Models\Grade' , 'level_id');
    }

}
