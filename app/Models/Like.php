<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //

    protected $table = 'likes';


    //relacion mani to one
    public function image()
    {
        return $this->belongsTo('App\Models\Image', 'image_id');
    }

    // Relacion con usuarios many to one 
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
