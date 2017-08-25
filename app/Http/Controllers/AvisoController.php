<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\superstar;
use Illuminate\Support\Facades\DB;
use Auth;

class AvisoController extends Controller
{
    //
    //Função para botao no painel admin
    public function createWarning(){
        return view('createWarning');
    }
    //Função para executar query do formulario
    public function createWarningRequest(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'text' => 'required',
            'level' => 'required'
        ]);
         DB::table('warnings')->insert([
             'title' => $request->title,
             'text' => $request->text,
             'level' => $request->level,
             'date' => $request->date
        ]);
         
            
        return redirect()->route('painelAdmin');
    }
    //Função para botão deletar no painel admin
    public function deleteWarning(){
        return view('deleteWarning');
    }
    //Função para executar query do formulario
    public function deleteWarningRequest(Request $request){
        $this->validate($request,[
            'title' =>'required'
        ]);
        DB::table('warnings')
        ->where('title', '=', $request->title)
        ->delete();
        return redirect()->route('painelAdmin');
    }
}
