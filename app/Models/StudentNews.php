<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentNews extends Model
{
    use HasFactory;
    protected $table = "students_news";
    protected $fillable = ['id' , 'title ', 'description' ,'level_id' , 'term_id' ,'status '  ];
}
