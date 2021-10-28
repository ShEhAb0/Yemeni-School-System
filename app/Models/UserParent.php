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
        return $this->belongsToMany('App\Models\User');
    }
}
