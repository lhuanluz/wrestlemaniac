<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lutador extends Model
{
    //

    protected $table = 'lutadores';

    protected $fillable = ['nome', 'pontos'];
}
