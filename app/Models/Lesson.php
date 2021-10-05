<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;


    protected $table = "lessons";
    protected $fillable = ['id' , 'title ', 'description' , 'subject_id' ,'term_id' , 'level_id' , 'total_likes', 'status'  ];

}
