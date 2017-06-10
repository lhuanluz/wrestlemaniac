<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lutador;


class LutadoresController extends Controller
{
    //

    public function cadastrar(Request $request) {
        Lutador::create(['nome' => 'Lutador 2', 'pontos' => 10]);
        Lutador::create(['nome' => 'Lutador 2', 'pontos' => 10]);
        echo 'Cadastrou';

    }


    public function listar($identificador) {
        //Lutador::where('id', $identificador)
        //        ->update(['pontos' => 25]);

        try {
            $lutador = Lutador::find($identificador);
            echo $lutador->nome;
        } catch(Exception $e) {
            echo 'Não encontrou lutador';
        }
        

    }
}
