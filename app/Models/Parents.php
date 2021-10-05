<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    use HasFactory;

    protected $table = "parents";
    protected $fillable = ['id' , 'parent_name ', 'username' , 'email' ,'password' , 'gender' , 'address', 'phone' , 'image' , 'parent_id_or_passport' , 'status'  ];

}
