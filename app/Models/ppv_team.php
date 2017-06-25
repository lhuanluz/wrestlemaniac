<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ppv_team extends Model
{
    protected $fillable = ['user_id','team_points','team_total_points','team_cash','superstar01','superstar02','superstar03','superstar04'];
    
    public function user(){
        return $this->hasOne('App\User');
    }
}
