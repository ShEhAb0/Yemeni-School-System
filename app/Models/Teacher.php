<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = "teachers";
    protected $fillable = ['id' , 'teacher_name ', 'username' , 'email' ,'password' , 'gender ' ,'phone' , 'address' , 'image' , 'teacher_education_certificate' ,'teacher_id_or_passport', 'status' ];
}
