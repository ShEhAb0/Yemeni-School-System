<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userlog extends Model
{
    use HasFactory;
    protected $table = "users_logs";
    protected $fillable = ['id' , 'student_name ', 'username' , 'email' ,'password' , 'gender ' ,'phone' , 'address' , 'image' , 'level_id' , 'term_id' , 'admin_id', 'status' ];}
