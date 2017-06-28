<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class league extends Model
{
    protected $fillable = ['league_name','league_points','owner','member1','member2','member3','member4','secret_password'];

}
