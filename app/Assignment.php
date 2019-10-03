<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    //

    public function user()
    {
    	$this->belongsTo('App/User');
    }
}
