<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $table = "schedules";
    protected $fillable = ['id' , 'level_id ', 'term_id' , 'status ' ];
}