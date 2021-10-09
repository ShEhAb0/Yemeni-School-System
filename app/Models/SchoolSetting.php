<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolSetting extends Model
{
    use HasFactory , softDeletes;
    protected $table ="school_settings";
    protected $fillable = ['id' , 'school_name' , 'school_phone' ,'school_email' ,'school_address', 'academic_year' ,
        'first_term_begin' , 'first_term_end' , 'second_term_begin'
        ,'second_term_end' , 'school_logo'];

}
