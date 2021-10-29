<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserParent extends Model
{
    use HasFactory;
    protected $table = "users_parents";
    protected $fillable = ['id' , 'user_id' , 'parent_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function grade()
    {
        return $this->belongsTo('App\Models\Grade' , 'level_id');
    }
}
