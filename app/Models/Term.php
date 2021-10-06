<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory;
    protected $table = "terms";
    protected $fillable = ['id' , 'name'];

    public function termsAssignments()
    {
        return $this->hasMany('App\Models\Term' , 'term_id');

    }
    public function termsAttachments()
    {
        return $this->hasMany('App\Models\Term' , 'term_id');

    }
    public function termsAttendances()
    {
        return $this->hasMany('App\Models\Term' , 'term_id');

    }
    public function termsExams()
    {
        return $this->hasMany('App\Models\Term' , 'term_id');

    }
    public function termsLessons()
    {
        return $this->hasMany('App\Models\Term' , 'term_id');

    }
    public function termsSchedules()
    {
        return $this->hasMany('App\Models\Term' , 'term_id');

    }
    public function termsSubjects()
    {
        return $this->hasMany('App\Models\Term' , 'term_id');

    }

}
