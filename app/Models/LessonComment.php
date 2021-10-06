<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonComment extends Model
{
    use HasFactory;
    protected $table = "lesson_comments";
    protected $fillable = ['id' , 'lesson_id ', 'user_id' , 'user_type' ,'comment' , 'total_likes ' , 'status' ];

    public function lessonsComments()
    {
        return $this->belongsTo('App\Models\Lesson' , 'lesson_id');

    }

}
