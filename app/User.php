<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DateTime;
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

    public function meals(){
        return $this->hasMany(Meal::class);
    }

    public function isToday($created_at){
      if (date('Y-m-d') == date('Y-m-d', strtotime($created_at))) {
          return true;
      } else{
      return false;
    }
    }
}
