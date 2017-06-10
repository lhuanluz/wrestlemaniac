<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Time;
use App\Models\Lutador;

class TimesController extends Controller
{
    //

    public function cadastrar() {   
        $time = new Time;
        $lutador = Lutador::find(1);
        $time->usuario = "Teste";
        $time->lutadores()->attach($lutador->id);
        $time->save();


    }
}
