<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function role(){
        return $this->belongsTo('App\roles','role_id');
    }

    public function notifs(){
        return $this->hasMany('App\notif','user_id');
    }
    
    public function conversations(){
        return $this->belongsToMany('App\conversation', 'conversation_users','user_id', 'conversation_id')->withPivot('unread');
    }


/* Student Specific Stuff */
    public function allSessionsUserAttends(){
        return $this->hasMany('App\booking','student_id');
    }

   
    public function sessionsUserAttends(){
       return $this->allSessionsUserAttends->whereHas('session', function ($query) {
            $query->where('finish','>',time());
        })->get(); 
    }    




/* Instructor Specific stuff */
    public function allSessionsUserIsTeaching(){
        return $this->hasMany('App\session','instructor_id');
    }

    public function sessionsUserIsTeaching(){
        return $this->allSessionsUserIsTeaching->where('finish','>',time());
    }




/* Generic Stuff */


    public function hasUpcomingSession(){
        return true;
    }



    public function unreadNotificationCount(){
        return $this->notifs->where('unread','=',1)->count();
    }

    public function unreadMessageCount(){
        $unreadCount = 0;
        foreach($this->conversations as $conv){
            if($conv->pivot->unread ==1){
                $unreadCount++;
            }
        }
        return $unreadCount;
    }

    public function profileThumbUrl(){
        return 'images/user.png';
    }

    public function profilePicLarge(){
        return 'images/profile.png';
    }


}
