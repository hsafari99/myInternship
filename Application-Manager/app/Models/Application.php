<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public function contact()
    {
        return $this->belongsTo('App\Models\Contact');
    }

    public function questions()
    {
        return $this->belongsToMany('App\Models\Question', 'answers')->withPivot('answer');
    }
}
