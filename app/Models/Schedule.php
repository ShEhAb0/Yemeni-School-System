<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $table = "schedules";
    protected $fillable = ['id' , 'level_id ', 'term_id' , 'status'];

    public function levelsSchedules()
    {
        return $this->belongsTo('App\Models\Grade' , 'level_id');

    }

    public function termsSchedules()
    {
        return $this->belongsTo('App\Models\Term' , 'term_id');

    }
}
