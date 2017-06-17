<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class superstar extends Model
{
    protected $fillable = ['name','brand','points','last_points','price','last_show','champion','belt'];
}
