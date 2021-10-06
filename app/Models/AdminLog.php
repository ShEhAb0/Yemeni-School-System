<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminLog extends Model
{
    use HasFactory;

    protected $table = "admins_log";
    protected $fillable = ['id' , 'admin_id ', 'action' , 'details' ,'action_name' ];

    public function adminsLogs()
    {
        return $this->belongsTo('App\Models\Admin' , 'admin_id');
    }

}
