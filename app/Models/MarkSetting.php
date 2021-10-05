<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarkSetting extends Model
{
    use HasFactory;
    protected $table = "marks_settings";
    protected $fillable = ['id' , 'attendance_mark ', 'assignments_marks' , 'exams_marks' ,'success_mark' , 'failed_subjects ' , 'status' ];
}
