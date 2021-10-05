<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = "subjects";
    protected $fillable = ['id' , 'subject_name ', 'subject_code' , 'term_id' ,'code' , 'level_id ' ,'has_teacher' , 'status ' ];
}
