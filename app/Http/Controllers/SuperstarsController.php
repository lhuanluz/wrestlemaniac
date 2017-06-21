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
            $lutador->image = $caminho;
            $lutador->save();
        return redirect()->route('painelAdmin');
        
        

    }

    public function editar(Request $request){
        $this->validate($request,[
            'name'  => 'required',
            'angle' => 'required',
            'match' => 'required'
        ]);
       
        if(isset($_POST['angle'])){
            intval($_POST['angle']);
           //(int)$_POST['angle'];
        }
        if(isset($_POST['match'])){
            intval($_POST['match']);
           // (int)$_POST['match']; 
        }
        if(isset($_POST['cage'])){
            (int)$_POST['cage']; 
        }
        if(isset($_POST['extra'])){
            (int)$_POST['mainevent']; 
            (int)$_POST['title']; 
            (int)$_POST['champ']; 
        }
        if(isset($_POST['tagteam'])){
            (int)$_POST['tagteam']; 
        }
        if(isset($_POST['estipulacao'])){
            (int)$_POST['estipulacao']; 
        }
        if(isset($_POST['squash'])){
            (int)$_POST['squash']; 
        }    
        
$pontos = $request->angle+$request->match+$request->cage+$request->mainevent+$request->title+$request->champ+$request->tagteam+$request->estipulacao+$request->squash;
       
        $ult_pontos = DB::table('superstars')
                        ->where('name',$request->get('name'))
                        ->value('points');

        $ult_preço = DB::table('superstars')
                        ->where('name',$request->get('name'))
                        ->value('price');
        
        if($pontos <= 2.5){
            if($ult_preço - (100 - $pontos * 10) <= 500){
                $ult_preço= 500.00;
            }else{
            $ult_preço = $ult_preço - (100 - $pontos * 10);
            }
        }else{
            $ult_preço = $ult_preço + ($pontos * 10);
        }
        DB::table('superstars')
            ->where('name', $request->get('name'))
            ->update([
                'last_points' => $ult_pontos,
                'points' => $pontos,
                'price' => $ult_preço,
                'last_show' => 1
                ]);

        return redirect()->route('painelAdmin');
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
    public function editarChampionRedirect(){
        $superstars = DB::table('superstars')->get();
        return view('editarChampion',['superstars' => $superstars]);
    }
    public function editarChampion(Request $request){
         $this->validate($request,[
            'name'      => 'required',
             'belt'    => 'required'
        ]);
        $superstarOld = DB::table('superstars')
            ->where('belt',$request->belt)
            ->update([
                'champion' => 0,
                'belt' => 'none'
                ]);


        DB::table('superstars')
            ->where('name', $request->name)
            ->update([
                'champion' => 1,
                'belt' => $request->belt
                ]);
        return redirect()->route('painelAdmin');
    }
    public function editarFotoRedirect(){
        $superstars = DB::table('superstars')->get();
        return view('editarFoto',['superstars' => $superstars]);
    }
    public function editarFoto(Request $request){
        $this->validate($request,[
            'name'      => 'required',
             'image'    => 'required'
        ]);

        $nomeDaImagem = $request->image->getClientOriginalName();
        $caminho = 'storage/superstars/'.$nomeDaImagem;
        $imagem = $request->image;
        $imagem->storeAs('superstars',$nomeDaImagem,'public');

        DB::table('superstars')
            ->where('name', $request->name)
            ->update([
                'image' => $caminho
                ]);
        return redirect()->route('painelAdmin');
    }
    public function editarBrandRedirect(){
        $superstars = DB::table('superstars')->get();
        return view('editarBrand',['superstars' => $superstars]);
    }
    public function editarBrand(Request $request){
        $this->validate($request,[
            'name'      => 'required',
             'brand'    => 'required'
        ]);

        DB::table('superstars')
            ->where('name', $request->name)
            ->update([
                'brand' => $request->brand
                ]);
        return redirect()->route('painelAdmin');
    }
    
}