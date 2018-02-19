<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class conversation extends Model
{
    public function messages(){
    	return $this->hasMany('App\message','conversation_id');
    }

    public function user(){
    	return $this->belongsToMany('App\User', 'conversation_users', 'conversation_id','user_id');
    }
}
