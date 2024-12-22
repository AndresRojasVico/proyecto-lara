<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $table = 'comments';
    // Relacion con imagenes many to one
    public function image()
    {
        return $this->belongsTo('App\Models\Image', 'image_id');
    }

    // Relacion con usuarios many to one 
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    // Relacion con los likes

}
