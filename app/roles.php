<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    public function usersWhoHaveThisRole(){
    	return $this->hasMany('App\User','role_id');
    }
}
