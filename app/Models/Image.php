<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    //Relacion one to many
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    //Relacion one to many con los like

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }

    //Relacon con los usuarios de many to one
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
