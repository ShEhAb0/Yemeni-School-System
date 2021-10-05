<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $table = "assignments";
    protected $fillable = ['id' , 'teacher_id ', 'student_id' , 'subject_id' ,'level_id' , 'term_id ' , 'due_date' , 'delivery_date' , 'mark' , 'status' ];

}
