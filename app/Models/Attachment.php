<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;
    protected $table = "attachments";
    protected $fillable = ['id' , 'type ', 'type_id' , 'attachment_type' ,'level_id' , 'term_id ' , 'due_date' , 'delivery_date' , 'mark' , 'status' ];

    public function levelsAttachments()
    {
        return $this->belongsTo('App\Models\Grade' , 'level_id');

    }

    public function termsAttachments()
    {
        return $this->belongsTo('App\Models\Term' , 'term_id');

    }

}
