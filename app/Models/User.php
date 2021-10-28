<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\App;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    protected $fillable = ['id' , 'student_name ', 'username' , 'email' ,'password' , 'gender ' ,'phone' , 'address' , 'image' , 'level_id' , 'term_id' , 'status' ];


    public function studentsAssignments()
    {
        return $this->hasMany('App\Models\User' , 'student_id');

    }
    public function termsStudents()
    {
        return $this->belongsTo('App\Models\Term' , 'term_id');

    }
    public function studendsLevels()
    {
        return $this->belongsTo('App\Models\Grade' , 'level_id');
    }
    public function grade()
    {
        return $this->belongsTo('App\Models\Grade' , 'level_id');

    }
    public function term()
    {
        return $this->belongsTo('App\Models\Term' , 'term_id');

    }
    public function parents()
    {
        return $this->belongsTo('App\Models\Parents');
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
