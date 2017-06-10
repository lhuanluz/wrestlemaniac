<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    //

    public function lutadores() {
        return $this->belongsTo('App\Models\Lutador', 'lutadores_times', 'time_id', 'lutador_id');
    }
}
