<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    public function session(){
    	return $this->belongsTo('App\session','session_id');
    }
}
