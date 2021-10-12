<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "schedules";
    protected $fillable = ['id' , 'level_id ', 'term_id' , 'file_name', 'status'];


    public function grade()
    {
        return $this->belongsTo('App\Models\Grade' , 'level_id');
    }

    public function term()
    {
        return $this->belongsTo('App\Models\Term' , 'term_id');
    }

    public function levelsSchedules()
    {
        return $this->belongsTo('App\Models\Grade' , 'level_id');

    }

    public function termsSchedules()
    {
        return $this->belongsTo('App\Models\Term' , 'term_id');

    }
}
