<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\superstar;
use Illuminate\Support\Facades\DB;

class SuperstarsController extends Controller
{
    public function cadastrar(Request $request){
         $this->validate($request,[
            'name'      => 'required',
             'brand'    => 'required',
             'imagem'   => 'image|required'
        ]);
        $nomeDaImagem = $request->imagem->getClientOriginalName();
        $caminho = 'storage/superstars/'.$nomeDaImagem;
        $imagem = $request->imagem;
        //$imagem->move('superstars',$nomeDaImagem);
        $imagem->storeAs('superstars',$nomeDaImagem,'public');
       /* $lutador = DB::table('superstars')->insert([
                        'name' => $request->get('name'), 
                        'brand' => $request->get('brand'),
                        'points' => 0.0,
                        'last_points' => 0.0,
                        'price' => 1000.00,
                        'last_show' => 0,
                        'image' => $caminho,
                        ]);*/
        $lutador = new superstar();
            $lutador->name = $request->get('name');
            $lutador->brand = $request->get('brand');
            $lutador->points = 0.0;
            $lutador->last_points = 0.0;
            $lutador->price = 1000.00;
            $lutador->last_show = 0;
            $lutador->image = $caminho;
            $lutador->save();
        return view('admin');
        
        

    }

    public function editar(Request $request){
        $this->validate($request,[
            'name'  => 'required',
             'points' => 'required',
             'price' => 'required'
        ]);
        
        
        $ult_pontos = DB::table('superstars')
                        ->where('name',$request->get('name'))
                        ->value('points');

        DB::table('superstars')
            ->where('name', $request->get('name'))
            ->update([
                'last_points' => $ult_pontos,
                'points' => $request->get('points'),
                'price' => $request->get('price'),
                'last_show' => 1
                ]);

        return view('admin');
    }

    public function mercado(){
        $superstars = DB::table('superstars')->get();
        return view('mercadoHome',['superstars' => $superstars]);
    }
    public function editPage(){
        $superstars = DB::table('superstars')->get();
        return view('editarSuperstar',['superstars' => $superstars]);
    }
}
