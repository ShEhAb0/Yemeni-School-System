<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $table = "attendances";
    protected $fillable = ['id' , 'subject_id ', 'level_id' , 'term_id' ,'lesson_id' , 'term_id ' , 'lesson_creation_date' , 'view_date' , 'mark' , 'status' ];

}
