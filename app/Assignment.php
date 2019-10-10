<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    //
    protected $fillable = [
        'file','user_id','title'
    ];

    public function user()
    {
    	$this->belongsTo('App/User');
    }
}
