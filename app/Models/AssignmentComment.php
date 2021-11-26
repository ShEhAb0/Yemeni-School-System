<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentComment extends Model
{
    use HasFactory;
    protected $table = "assignment_comments";
    public $timestamps = false;
    protected $fillable = ['id' , 'assignment_id ', 'user_id' , 'user_type' ,'comment' ,  'status' ];


    public function assignmentComments()
    {
        return $this->belongsTo('App\Models\Assignment' , 'assignment_id');

    }
}
