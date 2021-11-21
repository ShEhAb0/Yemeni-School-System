<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;

    public function student(){
        return $this->belongsTo('App\Models\User' , 'student_id');
    }

    public function subject(){
        return $this->belongsTo('App\Models\Subject' , 'subject_id');
    }

    public function term(){
        return $this->belongsTo('App\Models\Term' , 'term_id');
    }

    public function grade(){
        return $this->belongsTo('App\Models\Grade' , 'level_id');
    }
}
