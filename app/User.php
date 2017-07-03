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
        'name', 'email', 'password','user_power','id_league','type','photo'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function raw_team()
    {
        return $this->hasOne('App\Models\raw_team');
    }
    public function smackdown_team()
    {
        return $this->hasOne('App\Models\smackdown_team');
    }
    public function ppv_team()
    {
        return $this->hasOne('App\Models\ppv_team');
    }
    public function league()
    {
        return $this->hasOne('App\Models\league');
    }
    
    
}
