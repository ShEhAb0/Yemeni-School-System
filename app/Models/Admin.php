<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasFactory , Notifiable;
    protected $table = "admins";
    protected $fillable = ['id' , 'admin_name' , 'username' , 'email' ,'gender', 'password' , 'image' , 'type' , 'status'];

    public function adminsLogs()
    {
        return $this->hasMany('App\Models\Admin' , 'admin_id');
    }
}
