<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeacherSchedule extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table= 'teacher_schedules';

    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher' , 'teacher_id');
    }

    public function term()
    {
        return $this->belongsTo('App\Models\Term' , 'term_id');
    }
}
