<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentNews extends Model
{
    use HasFactory;
    protected $table = "student_news";
    protected $fillable = ['id' , 'title ', 'description' ,'level_id' , 'term_id' ,'status '  ];

    public function grade(){
        return $this->belongsTo('App\Models\Grade','level_id');
    }

    public function term(){
        return $this->belongsTo('App\Models\Term','term_id');
    }
}
