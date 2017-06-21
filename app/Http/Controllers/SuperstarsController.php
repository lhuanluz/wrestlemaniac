<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\superstar;
use Illuminate\Support\Facades\DB;
use Auth;

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
             'points' => 'required'
        ]);
        
        
        $ult_pontos = DB::table('superstars')
                        ->where('name',$request->get('name'))
                        ->value('points');

        $ult_preço = DB::table('superstars')
                        ->where('name',$request->get('name'))
                        ->value('price');
        
        if($request->points <= 2.5){
            if($ult_preço - (100 - $request->points * 10) <= 500){
                $ult_preço= 500.00;
            }else{
            $ult_preço = $ult_preço - (100 - $request->points * 10);
            }
        }else{
            $ult_preço = $ult_preço + ($request->points * 10);
        }
        DB::table('superstars')
            ->where('name', $request->get('name'))
            ->update([
                'last_points' => $ult_pontos,
                'points' => $request->get('points'),
                'price' => $ult_preço,
                'last_show' => 1
                ]);

        return redirect()->route('painelAdmin');
    }
    public function mercado(){
        return view('mercadoHome');
    }
    public function mercadoRaw(){
        $superstars = DB::table('superstars')
                 ->where('brand','Raw')
                 ->orwhere('brand','Nenhuma')
                 ->orderBy('name', 'asc')->get();
        $userId = Auth::user()->id;
        $rawTeam = DB::table('raw_teams')
                    ->where('user_id',$userId)
                    ->first();

        return view('mercadoRawHome',['superstars' => $superstars,'rawTeam' => $rawTeam]);
    }

    public function mercadoRawPreçoCrescente(){
        $superstars = DB::table('superstars')
                    ->where('brand','Raw')
                    ->orwhere('brand','Nenhuma')
                    ->orderBy('price', 'asc')->get();
        $userId = Auth::user()->id;
        $rawTeam = DB::table('raw_teams')
                    ->where('user_id',$userId)
                    ->first();
        return view('mercadoRawHome',['superstars' => $superstars,'rawTeam' => $rawTeam]);
    }

    public function mercadoRawPreçoDecrescente(){
        $superstars = DB::table('superstars')
                    ->where('brand','Raw')
                    ->orwhere('brand','Nenhuma')
                    ->orderBy('price', 'desc')->get();
        $userId = Auth::user()->id;
        $rawTeam = DB::table('raw_teams')
                    ->where('user_id',$userId)
                    ->first();
        return view('mercadoRawHome',['superstars' => $superstars,'rawTeam' => $rawTeam]);
    }

    public function mercadoRawPontosCrescente(){
        $superstars = DB::table('superstars')
                    ->where('brand','Raw')
                    ->orwhere('brand','Nenhuma')
                    ->orderBy('points', 'asc')->get();
        $userId = Auth::user()->id;
        $rawTeam = DB::table('raw_teams')
                    ->where('user_id',$userId)
                    ->first();
       return view('mercadoRawHome',['superstars' => $superstars,'rawTeam' => $rawTeam]);
    }
    public function mercadoRawPontosDecrescente(){
        $superstars = DB::table('superstars')
                    ->where('brand','Raw')
                    ->orwhere('brand','Nenhuma')
                    ->orderBy('points', 'desc')->get();
        $userId = Auth::user()->id;
        $rawTeam = DB::table('raw_teams')
                    ->where('user_id',$userId)
                    ->first();
        return view('mercadoRawHome',['superstars' => $superstars,'rawTeam' => $rawTeam]);
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
    public function comprarSuperstarRaw(Request $request){
        $userId = Auth::user()->id;

        $superstar = DB::table('superstars')
                    ->where('name',$request->name)
                    ->first();

        if($superstar->brand == 'Raw'){
            $superstarBrandTable = 'raw_teams';
        }else{
            $superstar->brand = 'smackdown_teams';
        }

        $userTeam = DB::table($superstarBrandTable)
                    ->where('user_id',$userId)
                    ->first();
        
        if ($userTeam->superstar01 == 999){
            DB::table($superstarBrandTable)
                ->where('user_id',$userId)
                ->update([
                'superstar01' => $superstar->id,
                'team_cash' => $userTeam->team_cash - $superstar->price
                ]);
        }else if ($userTeam->superstar02 == 998){
            DB::table($superstarBrandTable)
                ->where('user_id',$userId)
                ->update([
                'superstar02' => $superstar->id,
                'team_cash' => $userTeam->team_cash - $superstar->price
                ]);
        }else if ($userTeam->superstar03 == 997){
            DB::table($superstarBrandTable)
                ->where('user_id',$userId)
                ->update([
                'superstar03' => $superstar->id,
                'team_cash' => $userTeam->team_cash - $superstar->price
                ]);
        }
        else if ($userTeam->superstar04 == 996){
            DB::table($superstarBrandTable)
                ->where('user_id',$userId)
                ->update([
                'superstar04' => $superstar->id,
                'team_cash' => $userTeam->team_cash - $superstar->price
                ]);
        }else{
            echo "ERRO";
        }
        return redirect()->route('mercadoRawHome');
    }
    public function venderSuperstarRaw(Request $request){
        $userId = Auth::user()->id;

        $superstar = DB::table('superstars')
                    ->where('name',$request->name)
                    ->first();
        $userTeam = DB::table('raw_teams')
                    ->where('user_id',$userId)
                    ->first();
        if ($userTeam->superstar01 == $superstar->id){
             DB::table('raw_teams')
                ->where('user_id',$userId)
                ->update([
                'superstar01' => 999,
                'team_cash' => $userTeam->team_cash + $superstar->price
                ]);
        }else if ($userTeam->superstar02 == $superstar->id){
             DB::table('raw_teams')
                ->where('user_id',$userId)
                ->update([
                'superstar02' => 998,
                'team_cash' => $userTeam->team_cash + $superstar->price
                ]);
        }else if ($userTeam->superstar03 == $superstar->id){
             DB::table('raw_teams')
                ->where('user_id',$userId)
                ->update([
                'superstar03' => 997,
                'team_cash' => $userTeam->team_cash + $superstar->price
                ]);
        }else if ($userTeam->superstar04 == $superstar->id){
             DB::table('raw_teams')
                ->where('user_id',$userId)
                ->update([
                'superstar04' => 996,
                'team_cash' => $userTeam->team_cash + $superstar->price
                ]);
        }else{
            echo 'Erro';
        }
        return redirect()->route('mercadoRawHome');
    }
    
}
