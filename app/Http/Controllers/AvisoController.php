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
             'level' => $request->level
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
    //Função para mostrar todos os avisos na view teste2 ele ta dando um print_r bem groço mas era so pra ver se tava funfando na view mesmo provavelmente faz um foreach
    public function showWarnings(){
        $warning = DB::table('warnings')
        ->select('title','text','level')
        ->get();
        return view('teste2',[
                    'warning' => $warning                    
        ]);
    }
}
