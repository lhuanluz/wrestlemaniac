<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\superstar;
use Illuminate\Support\Facades\DB;

class SuperstarsController extends Controller
{
    public function criarSuperstar(){
        return view('criarSuperstar');
    }

    public function cadastrar(Request $request){
         $this->validate($request,[
            'name'      => 'required',
             'brand'    => 'required',
             'imagem'   => 'image|required'
        ]);
        $nomeDaImagem = $request->imagem->getClientOriginalName();
        $caminho = 'storage/superstars/'.$nomeDaImagem;
        $imagem = $request->imagem;
        $imagem->storeAs('superstars',$nomeDaImagem,'public');
        
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
             'points' => 'required'
        ]);
        
        
        $ult_pontos = DB::table('superstars')
                        ->where('name',$request->get('name'))
                        ->value('points');

        $ult_preço = DB::table('superstars')
                        ->where('name',$request->get('name'))
                        ->value('price');
        
        if($request->points >= 0.0 && $request->points <= 0.5){
            if($ult_preço - 350.00 < 500){
                $ult_preço = 500.00;
            }else{
                $ult_preço = $ult_preço - 350.00;
             }
        }
        else if($request->points >= 1.0 && $request->points <= 1.5){
            if($ult_preço - 250.00 < 500){
                $ult_preço = 500.00;
            }else{
                $ult_preço = $ult_preço - 250.00;
             }
        }
        else if($request->points >= 2.0 && $request->points <= 2.5){
            if($ult_preço - 150.00 < 500){
                $ult_preço = 500.00;
            }else{
                $ult_preço = $ult_preço - 150.00;
             }
        }
        else if($request->points >= 3.0 && $request->points <= 4.0){
            $ult_preço = $ult_preço = 0.00;
        }
        else if($request->points >= 4.5 && $request->points <= 5.0){
            if($ult_preço + 100.00 > 1500.00){
                $ult_preço = 1500.00;
            }else{
                $ult_preço = $ult_preço + 100.00;
             }
        }
        else if($request->points >= 5.5 && $request->points <= 6.0){
            if($ult_preço + 200.00 > 1500.00){
                $ult_preço = 1500.00;
            }else{
                $ult_preço = $ult_preço + 200.00;
             }
        }
        else if($request->points >= 6.5){
            if($ult_preço + 300.00 > 1500.00){
                $ult_preço = 1500.00;
            }else{
                $ult_preço = $ult_preço + 300.00;
             }
        }
        DB::table('superstars')
            ->where('name', $request->get('name'))
            ->update([
                'last_points' => $ult_pontos,
                'points' => $request->get('points'),
                'price' => $ult_preço,
                'last_show' => 1
                ]);

        return view('admin');
    }

    public function mercado(){
        $superstars = DB::table('superstars')->orderBy('name', 'asc')->get();
        return view('mercadoHome',['superstars' => $superstars]);
    }

    public function mercadoPreçoCrescente(){
        $superstars = DB::table('superstars')->orderBy('price', 'asc')->get();
        return view('mercadoHome',['superstars' => $superstars]);
    }

    public function mercadoPreçoDecrescente(){
        $superstars = DB::table('superstars')->orderBy('price', 'desc')->get();
        return view('mercadoHome',['superstars' => $superstars]);
    }

    public function mercadoPontosCrescente(){
        $superstars = DB::table('superstars')->orderBy('points', 'asc')->get();
        return view('mercadoHome',['superstars' => $superstars]);
    }

    public function mercadoPontosDecrescente(){
        $superstars = DB::table('superstars')->orderBy('points', 'desc')->get();
        return view('mercadoHome',['superstars' => $superstars]);
    }

    public function editPage(){
        $superstars = DB::table('superstars')->get();
        return view('editarSuperstar',['superstars' => $superstars]);
    }
    
}
