<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    public function conversation(){
    	return $this->belongsTo('App\conversation','conversation_id');
    }

    public function user(){
    	return $this->belongsTo('App\User','sender_id');
    }
}
