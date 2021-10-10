<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use function Symfony\Component\Translation\t;


class Grade extends Model
{
    use HasFactory ;
    use SoftDeletes;
    protected $fillable = ['id' , 'grade_code', 'grade_name' , 'status'];

    public function levelsAssignments()
    {
        return $this->hasMany('App\Models\Grade' , 'level_id');

    }

    public function levelsAttachments()
    {
        return $this->hasMany('App\Models\Grade' , 'level_id');

    }
    public function levelsAttendances()
    {
        return $this->hasMany('App\Models\Grade' , 'level_id');

    }
    public function levelsExams()
    {
        return $this->hasMany('App\Models\Grade' , 'level_id');

    }

    public function levelsLessons()
    {
        return $this->hasMany('App\Models\Grade' , 'level_id');

    }

    public function levelsSchedules()
    {
        return $this->hasMany('App\Models\Grade' , 'level_id');

    }

    public function levelsSubjects()
    {
        return $this->hasMany('App\Models\Grade' , 'level_id');

    }

    public function teachersLevels()
    {
        return $this->hasMany('App\Models\Grade' , 'level_id');
    }

    public function studendsLevels()
    {
        return $this->hasMany('App\Models\Grade' , 'level_id');
    }

    public function grade()
    {
        return $this->hasMany('App\Models\Grade' , 'level_id');

    }

}
