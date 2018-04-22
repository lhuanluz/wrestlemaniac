<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\superstar;
use Illuminate\Support\Facades\DB;
use Auth;

class MarketController extends Controller
{
    public function editarMercadoStatusRedirect(){
        // Retorna o usuário para a página de edição do status do mercado
        return view('admin/mercadoStatus');  
    }

    public function editarPpvBrandRedirect(){
        // Retorna o usuário para a página de edição da brand do PPV
        return view('admin/editarPpvBrand');
    }

    public function editarPpvVisibilidadeRedirect(){
        // Retorna o usuário para a página de edição da visibilidade do PPV
        return view('admin/editarVisibilidadePpv');
    }

    public function editarPpvNomeRedirect(){
        // Retorna o usuário para a página de edição da visibilidade do PPV
        return view('admin/editarPpvNome');
    }

    public function mercadoRaw(){
        if (Auth::guest()) {
            return redirect()->route('inicio');
        }else{
            $superstars = DB::table('superstars')
                 ->where('brand','Raw')
                 ->orwhere('brand','Nenhuma')
                 ->orderBy('name', 'asc')->get();
        $userId = Auth::user()->id;
        $rawTeam = DB::table('raw_teams')
                    ->where('user_id',$userId)
                    ->first();
         $status = DB::table('configs')->value('statusMercadoRaw');

        return view('mercadoRawHome',['superstars' => $superstars,'rawTeam' => $rawTeam,'status' => $status]);
        }
        
    }

    public function mercadoRawPreçoCrescente(){
        if (Auth::guest()) {
            return redirect()->route('inicio');
        }else{
        $superstars = DB::table('superstars')
                    ->where('brand','Raw')
                    ->orwhere('brand','Nenhuma')
                    ->orderBy('price', 'asc')->get();
        $userId = Auth::user()->id;
        $rawTeam = DB::table('raw_teams')
                    ->where('user_id',$userId)
                    ->first();
        $status = DB::table('configs')->value('statusMercadoRaw');
         
        return view('mercadoRawHome',['superstars' => $superstars,'rawTeam' => $rawTeam,'status' => $status]);
        }
    }

    public function mercadoRawPreçoDecrescente(){
        if (Auth::guest()) {
            return redirect()->route('inicio');
        }else{
        $superstars = DB::table('superstars')
                    ->where('brand','Raw')
                    ->orwhere('brand','Nenhuma')
                    ->orderBy('price', 'desc')->get();
        $userId = Auth::user()->id;
        $rawTeam = DB::table('raw_teams')
                    ->where('user_id',$userId)
                    ->first();
        $status = DB::table('configs')->value('statusMercadoRaw');
         
        return view('mercadoRawHome',['superstars' => $superstars,'rawTeam' => $rawTeam,'status' => $status]);
        }
    }

    public function mercadoRawPontosCrescente(){
        if (Auth::guest()) {
            return redirect()->route('inicio');
        }else{
        $superstars = DB::table('superstars')
                    ->where('brand','Raw')
                    ->orwhere('brand','Nenhuma')
                    ->orderBy('points', 'asc')->get();
        $userId = Auth::user()->id;
        $rawTeam = DB::table('raw_teams')
                    ->where('user_id',$userId)
                    ->first();
      $status = DB::table('configs')->value('statusMercadoRaw');
         
        return view('mercadoRawHome',['superstars' => $superstars,'rawTeam' => $rawTeam,'status' => $status]);
        }
    }
    public function mercadoRawPontosDecrescente(){
        if (Auth::guest()) {
            return redirect()->route('inicio');
        }else{
        $superstars = DB::table('superstars')
                    ->where('brand','Raw')
                    ->orwhere('brand','Nenhuma')
                    ->orderBy('points', 'desc')->get();
        $userId = Auth::user()->id;
        $rawTeam = DB::table('raw_teams')
                    ->where('user_id',$userId)
                    ->first();
        $status = DB::table('configs')->value('statusMercadoRaw');
         
        return view('mercadoRawHome',['superstars' => $superstars,'rawTeam' => $rawTeam,'status' => $status]);
        }
    }
    public function comprarSuperstarRaw(Request $request){
        $userId = Auth::user()->id;

        $superstar = DB::table('superstars')
                    ->where('name',$request->name)
                    ->first();

        $userTeam = DB::table('raw_teams')
                    ->where('user_id',$userId)
                    ->first();
        $status = DB::table('configs')->value('statusMercadoRaw');
        if($superstar->id != $userTeam->superstar01 && $superstar->id != $userTeam->superstar02 && $superstar->id != $userTeam->superstar03 &&$superstar->id != $userTeam->superstar04 && $status == 'Aberto'){
            DB::table('market_purchases')->insert([
                'id_user' => $userId,
                'id_superstar' => $superstar->id,
                'market' => 'Raw'
            ]);
            if ($userTeam->superstar01 == 103){
                DB::table('raw_teams')
                    ->where('user_id',$userId)
                    ->update([
                    'superstar01' => $superstar->id,
                    'team_cash' => $userTeam->team_cash - $superstar->price
                    ]);
            }else if ($userTeam->superstar02 == 102){
                DB::table('raw_teams')
                    ->where('user_id',$userId)
                    ->update([
                    'superstar02' => $superstar->id,
                    'team_cash' => $userTeam->team_cash - $superstar->price
                    ]);
            }else if ($userTeam->superstar03 == 101){
                DB::table('raw_teams')
                    ->where('user_id',$userId)
                    ->update([
                    'superstar03' => $superstar->id,
                    'team_cash' => $userTeam->team_cash - $superstar->price
                    ]);
            }
            else if ($userTeam->superstar04 == 100){
                DB::table('raw_teams')
                    ->where('user_id',$userId)
                    ->update([
                    'superstar04' => $superstar->id,
                    'team_cash' => $userTeam->team_cash - $superstar->price
                    ]);
            }else{
                echo "ERRO";
            }
            return redirect()->route('mercadoRawHome');
        }else{
            return redirect()->route('mercadoRawHome');
        }
    }
    public function venderSuperstarRaw(Request $request){
        $userId = Auth::user()->id;

        $superstar = DB::table('superstars')
                    ->where('name',$request->name)
                    ->first();
        $userTeam = DB::table('raw_teams')
                    ->where('user_id',$userId)
                    ->first();
        $status = DB::table('configs')->value('statusMercadoRaw');
        if($superstar->id == $userTeam->superstar01 || $superstar->id == $userTeam->superstar02 || $superstar->id == $userTeam->superstar03 || $superstar->id == $userTeam->superstar04 && $status == 'Aberto'){
            if ($userTeam->superstar01 == $superstar->id){
                DB::table('raw_teams')
                    ->where('user_id',$userId)
                    ->update([
                    'superstar01' => 103,
                    'team_cash' => $userTeam->team_cash + $superstar->price
                    ]);
            }else if ($userTeam->superstar02 == $superstar->id){
                DB::table('raw_teams')
                    ->where('user_id',$userId)
                    ->update([
                    'superstar02' => 102,
                    'team_cash' => $userTeam->team_cash + $superstar->price
                    ]);
            }else if ($userTeam->superstar03 == $superstar->id){
                DB::table('raw_teams')
                    ->where('user_id',$userId)
                    ->update([
                    'superstar03' => 101,
                    'team_cash' => $userTeam->team_cash + $superstar->price
                    ]);
            }else if ($userTeam->superstar04 == $superstar->id){
                DB::table('raw_teams')
                    ->where('user_id',$userId)
                    ->update([
                    'superstar04' => 100,
                    'team_cash' => $userTeam->team_cash + $superstar->price
                    ]);
            }else{
                echo 'Erro';
            }
            return redirect()->route('mercadoRawHome');
        }
            return redirect()->route('mercadoRawHome');
    }
    public function mercadoSmackdown(){
        if (Auth::guest()) {
            return redirect()->route('inicio');
        }else{
        $superstars = DB::table('superstars')
                 ->where('brand','Smackdown')
                 ->orwhere('brand','Nenhuma')
                 ->orderBy('name', 'asc')->get();
        $userId = Auth::user()->id;
        $smackdownTeam = DB::table('smackdown_teams')
                    ->where('user_id',$userId)
                    ->first();
        $status = DB::table('configs')->value('statusMercadoSmackdown');

        return view('mercadoSmackdownHome',['superstars' => $superstars,'smackdownTeam' => $smackdownTeam,'status' => $status]);
        }
    }

    public function mercadoSmackdownPreçoCrescente(){
        if (Auth::guest()) {
            return redirect()->route('inicio');
        }else{
        $superstars = DB::table('superstars')
                    ->where('brand','Smackdown')
                    ->orwhere('brand','Nenhuma')
                    ->orderBy('price', 'asc')->get();
        $userId = Auth::user()->id;
        $smackdownTeam = DB::table('smackdown_teams')
                    ->where('user_id',$userId)
                    ->first();
        $status = DB::table('configs')->value('statusMercadoSmackdown');

        return view('mercadoSmackdownHome',['superstars' => $superstars,'smackdownTeam' => $smackdownTeam,'status' => $status]);
        }
    }

    public function mercadoSmackdownPreçoDecrescente(){
        if (Auth::guest()) {
            return redirect()->route('inicio');
        }else{
        $superstars = DB::table('superstars')
                    ->where('brand','Smackdown')
                    ->orwhere('brand','Nenhuma')
                    ->orderBy('price', 'desc')->get();
        $userId = Auth::user()->id;
        $smackdownTeam = DB::table('smackdown_teams')
                    ->where('user_id',$userId)
                    ->first();
        $status = DB::table('configs')->value('statusMercadoSmackdown');

        return view('mercadoSmackdownHome',['superstars' => $superstars,'smackdownTeam' => $smackdownTeam,'status' => $status]);
        }
    }

    public function mercadoSmackdownPontosCrescente(){
        if (Auth::guest()) {
            return redirect()->route('inicio');
        }else{
        $superstars = DB::table('superstars')
                    ->where('brand','Smackdown')
                    ->orwhere('brand','Nenhuma')
                    ->orderBy('points', 'asc')->get();
        $userId = Auth::user()->id;
        $smackdownTeam = DB::table('smackdown_teams')
                    ->where('user_id',$userId)
                    ->first();
       $status = DB::table('configs')->value('statusMercadoSmackdown');

        return view('mercadoSmackdownHome',['superstars' => $superstars,'smackdownTeam' => $smackdownTeam,'status' => $status]);
        }
    }
    public function mercadoSmackdownPontosDecrescente(){
        if (Auth::guest()) {
            return redirect()->route('inicio');
        }else{
        $superstars = DB::table('superstars')
                    ->where('brand','Smackdown')
                    ->orwhere('brand','Nenhuma')
                    ->orderBy('points', 'desc')->get();
        $userId = Auth::user()->id;
        $smackdownTeam = DB::table('smackdown_teams')
                    ->where('user_id',$userId)
                    ->first();
        $status = DB::table('configs')->value('statusMercadoSmackdown');

        return view('mercadoSmackdownHome',['superstars' => $superstars,'smackdownTeam' => $smackdownTeam,'status' => $status]);
        }
    }
    public function comprarSuperstarSmackdown(Request $request){
        $userId = Auth::user()->id;

        $superstar = DB::table('superstars')
                    ->where('name',$request->name)
                    ->first();

        $userTeam = DB::table('smackdown_teams')
                    ->where('user_id',$userId)
                    ->first();
        $status = DB::table('configs')->value('statusMercadoSmackdown');
        if($superstar->id != $userTeam->superstar01 && $superstar->id != $userTeam->superstar02 && $superstar->id != $userTeam->superstar03 &&$superstar->id != $userTeam->superstar04 && $status == 'Aberto'){
            DB::table('market_purchases')->insert([
                'id_user' => $userId,
                'id_superstar' => $superstar->id,
                'market' => 'Smackdown'
            ]);
            if ($userTeam->superstar01 == 103){
                DB::table('smackdown_teams')
                    ->where('user_id',$userId)
                    ->update([
                    'superstar01' => $superstar->id,
                    'team_cash' => $userTeam->team_cash - $superstar->price
                    ]);
            }else if ($userTeam->superstar02 == 102){
                DB::table('smackdown_teams')
                    ->where('user_id',$userId)
                    ->update([
                    'superstar02' => $superstar->id,
                    'team_cash' => $userTeam->team_cash - $superstar->price
                    ]);
            }else if ($userTeam->superstar03 == 101){
                DB::table('smackdown_teams')
                    ->where('user_id',$userId)
                    ->update([
                    'superstar03' => $superstar->id,
                    'team_cash' => $userTeam->team_cash - $superstar->price
                    ]);
            }
            else if ($userTeam->superstar04 == 100){
                DB::table('smackdown_teams')
                    ->where('user_id',$userId)
                    ->update([
                    'superstar04' => $superstar->id,
                    'team_cash' => $userTeam->team_cash - $superstar->price
                    ]);
            }else{
                echo "ERRO";
            }
            return redirect()->route('mercadoSmackdownHome');
        }
        return redirect()->route('mercadoSmackdownHome');
    }
    public function venderSuperstarSmackdown(Request $request){
        $userId = Auth::user()->id;

        $superstar = DB::table('superstars')
                    ->where('name',$request->name)
                    ->first();
        $userTeam = DB::table('smackdown_teams')
                    ->where('user_id',$userId)
                    ->first();
        $status = DB::table('configs')->value('statusMercadoSmackdown');
        if($superstar->id == $userTeam->superstar01 || $superstar->id == $userTeam->superstar02 || $superstar->id == $userTeam->superstar03 || $superstar->id == $userTeam->superstar04 && $status == 'Aberto'){
            if ($userTeam->superstar01 == $superstar->id){
                DB::table('smackdown_teams')
                    ->where('user_id',$userId)
                    ->update([
                    'superstar01' => 103,
                    'team_cash' => $userTeam->team_cash + $superstar->price
                    ]);
            }else if ($userTeam->superstar02 == $superstar->id){
                DB::table('smackdown_teams')
                    ->where('user_id',$userId)
                    ->update([
                    'superstar02' => 102,
                    'team_cash' => $userTeam->team_cash + $superstar->price
                    ]);
            }else if ($userTeam->superstar03 == $superstar->id){
                DB::table('smackdown_teams')
                    ->where('user_id',$userId)
                    ->update([
                    'superstar03' => 101,
                    'team_cash' => $userTeam->team_cash + $superstar->price
                    ]);
            }else if ($userTeam->superstar04 == $superstar->id){
                DB::table('smackdown_teams')
                    ->where('user_id',$userId)
                    ->update([
                    'superstar04' => 100,
                    'team_cash' => $userTeam->team_cash + $superstar->price
                    ]);
            }else{
                echo 'Erro';
            }
            return redirect()->route('mercadoSmackdownHome');
        }
        return redirect()->route('mercadoSmackdownHome');
    }
    public function mercadoPpv(){
        if (Auth::guest()) {
            return redirect()->route('inicio');
        }else{
        $brand = DB::table('configs')->value('ppvBrand');

        if($brand == 'Both'){
            $superstars = DB::table('superstars')
                ->where('brand','Raw')
                ->OrWhere('brand','Smackdown')
                ->orwhere('brand','Nenhuma')
                 ->orderBy('name', 'asc')->get();
        }else{
            $superstars = DB::table('superstars')
                 ->where('brand',$brand)
                 ->orwhere('brand','Nenhuma')
                 ->orderBy('name', 'asc')->get();
        }
        
        $userId = Auth::user()->id;
        $ppvTeam = DB::table('ppv_teams')
                    ->where('user_id',$userId)
                    ->first();
         $status = DB::table('configs')->value('statusMercadoPpv');

        return view('mercadoPpvHome',['superstars' => $superstars,'ppvTeam' => $ppvTeam,'status' => $status]);
        }
    }

    public function mercadoPpvPreçoCrescente(){
        if (Auth::guest()) {
            return redirect()->route('inicio');
        }else{
        $brand = DB::table('configs')->value('ppvBrand');

        if($brand == 'Both'){
            $superstars = DB::table('superstars')
                ->where('brand','Raw')
                ->OrWhere('brand','Smackdown')
                ->orwhere('brand','Nenhuma')
                 ->orderBy('price', 'asc')->get();
        }else{
            $superstars = DB::table('superstars')
                 ->where('brand',$brand)
                 ->orwhere('brand','Nenhuma')
                 ->orderBy('price', 'asc')->get();
        }

        $userId = Auth::user()->id;
        $ppvTeam = DB::table('ppv_teams')
                    ->where('user_id',$userId)
                    ->first();
        $status = DB::table('configs')->value('statusMercadoPpv');
         
        return view('mercadoPpvHome',['superstars' => $superstars,'ppvTeam' => $ppvTeam,'status' => $status]);
        }
    }

    public function mercadoPpvPreçoDecrescente(){
        if (Auth::guest()) {
            return redirect()->route('inicio');
        }else{
        $brand = DB::table('configs')->value('ppvBrand');

        if($brand == 'Both'){
            $superstars = DB::table('superstars')
                ->where('brand','Raw')
                ->OrWhere('brand','Smackdown')
                ->orwhere('brand','Nenhuma')
                 ->orderBy('price', 'desc')->get();
        }else{
            $superstars = DB::table('superstars')
                 ->where('brand',$brand)
                 ->orwhere('brand','Nenhuma')
                 ->orderBy('price', 'desc')->get();
        }

        $userId = Auth::user()->id;
        $ppvTeam = DB::table('ppv_teams')
                    ->where('user_id',$userId)
                    ->first();
        $status = DB::table('configs')->value('statusMercadoPpv');
         
        return view('mercadoPpvHome',['superstars' => $superstars,'ppvTeam' => $ppvTeam,'status' => $status]);
        }
    }

    public function mercadoPpvPontosCrescente(){
        if (Auth::guest()) {
            return redirect()->route('inicio');
        }else{
        $brand = DB::table('configs')->value('ppvBrand');

        if($brand == 'Both'){
            $superstars = DB::table('superstars')
                ->where('brand','Raw')
                ->OrWhere('brand','Smackdown')
                ->orwhere('brand','Nenhuma')
                 ->orderBy('points', 'asc')->get();
        }else{
            $superstars = DB::table('superstars')
                 ->where('brand',$brand)
                 ->orwhere('brand','Nenhuma')
                 ->orderBy('points', 'asc')->get();
        }

        $userId = Auth::user()->id;
        $ppvTeam = DB::table('ppv_teams')
                    ->where('user_id',$userId)
                    ->first();
      $status = DB::table('configs')->value('statusMercadoPpv');
         
        return view('mercadoPpvHome',['superstars' => $superstars,'ppvTeam' => $ppvTeam,'status' => $status]);
        }
    }
    public function mercadoPpvPontosDecrescente(){
        if (Auth::guest()) {
            return redirect()->route('inicio');
        }else{
        $brand = DB::table('configs')->value('ppvBrand');

        if($brand == 'Both'){
            $superstars = DB::table('superstars')
                ->where('brand','Raw')
                ->OrWhere('brand','Smackdown')
                ->orwhere('brand','Nenhuma')
                 ->orderBy('points', 'desc')->get();
        }else{
            $superstars = DB::table('superstars')
                 ->where('brand',$brand)
                 ->orwhere('brand','Nenhuma')
                 ->orderBy('points', 'desc')->get();
        }

        $userId = Auth::user()->id;
        $ppvTeam = DB::table('ppv_teams')
                    ->where('user_id',$userId)
                    ->first();
        $status = DB::table('configs')->value('statusMercadoPpv');
         
        return view('mercadoPpvHome',['superstars' => $superstars,'ppvTeam' => $ppvTeam,'status' => $status]);
        }
    }
    public function comprarSuperstarPpv(Request $request){
        $userId = Auth::user()->id;

        $superstar = DB::table('superstars')
                    ->where('name',$request->name)
                    ->first();

        $userTeam = DB::table('ppv_teams')
                    ->where('user_id',$userId)
                    ->first();
        
        $status = DB::table('configs')->value('statusMercadoPpv');
        if($superstar->id != $userTeam->superstar01 && $superstar->id != $userTeam->superstar02 && $superstar->id != $userTeam->superstar03 &&$superstar->id != $userTeam->superstar04  && $status == 'Aberto'){
            if ($userTeam->superstar01 == 103){
                DB::table('ppv_teams')
                    ->where('user_id',$userId)
                    ->update([
                    'superstar01' => $superstar->id,
                    'team_cash' => $userTeam->team_cash - $superstar->price
                    ]);
            }else if ($userTeam->superstar02 == 102){
                DB::table('ppv_teams')
                    ->where('user_id',$userId)
                    ->update([
                    'superstar02' => $superstar->id,
                    'team_cash' => $userTeam->team_cash - $superstar->price
                    ]);
            }else if ($userTeam->superstar03 == 101){
                DB::table('ppv_teams')
                    ->where('user_id',$userId)
                    ->update([
                    'superstar03' => $superstar->id,
                    'team_cash' => $userTeam->team_cash - $superstar->price
                    ]);
            }
            else if ($userTeam->superstar04 == 100){
                DB::table('ppv_teams')
                    ->where('user_id',$userId)
                    ->update([
                    'superstar04' => $superstar->id,
                    'team_cash' => $userTeam->team_cash - $superstar->price
                    ]);
            }else{
                echo "ERRO";
            }
            return redirect()->route('mercadoPpvHome');
        }
        return redirect()->route('mercadoPpvHome');
    }
    public function venderSuperstarPpv(Request $request){
        $userId = Auth::user()->id;

        $superstar = DB::table('superstars')
                    ->where('name',$request->name)
                    ->first();
        $userTeam = DB::table('ppv_teams')
                    ->where('user_id',$userId)
                    ->first();
        $status = DB::table('configs')->value('statusMercadoPpv');
        if($superstar->id == $userTeam->superstar01 || $superstar->id == $userTeam->superstar02 || $superstar->id == $userTeam->superstar03 || $superstar->id == $userTeam->superstar04 && $status == 'Aberto'){
            if ($userTeam->superstar01 == $superstar->id){
                DB::table('ppv_teams')
                    ->where('user_id',$userId)
                    ->update([
                    'superstar01' => 103,
                    'team_cash' => $userTeam->team_cash + $superstar->price
                    ]);
            }else if ($userTeam->superstar02 == $superstar->id){
                DB::table('ppv_teams')
                    ->where('user_id',$userId)
                    ->update([
                    'superstar02' => 102,
                    'team_cash' => $userTeam->team_cash + $superstar->price
                    ]);
            }else if ($userTeam->superstar03 == $superstar->id){
                DB::table('ppv_teams')
                    ->where('user_id',$userId)
                    ->update([
                    'superstar03' => 101,
                    'team_cash' => $userTeam->team_cash + $superstar->price
                    ]);
            }else if ($userTeam->superstar04 == $superstar->id){
                DB::table('ppv_teams')
                    ->where('user_id',$userId)
                    ->update([
                    'superstar04' => 100,
                    'team_cash' => $userTeam->team_cash + $superstar->price
                    ]);
            }else{
                echo 'Erro';
            }
            return redirect()->route('mercadoPpvHome');
        }
        return redirect()->route('mercadoPpvHome');
    }
    public function editarMercadoStatus(Request $request){
        // Início da Validação
            // Valida os campos market e action
            $this->validate($request,[
                'market'      => 'required',
                'action'    => 'required'
            ]);
        // Fim da Validação

        $mercado = $request->market; // Define o mercado que deseja ser editado
        $action = $request->action; // Define a ação que é desejada: Fechar ou Abri
        
        if($mercado == 'Raw'){ //Se o usuário desejar modificar o mercado do RAW

            $tabela = 'raw_teams'; // Define a tabela a ser modificada
            $coluna = 'statusMercadoRaw'; // Define a coluna de configurações que será modificada

        }else if($mercado == 'Smackdown'){ // Se o usuário desejar modificar o mercado do SMACKDOWN

            $tabela = 'smackdown_teams'; // Define a tabela a ser modificada
            $coluna = 'statusMercadoSmackdown'; // Define a coluna de configurações que será modificada

        }else{ // Se o usuário desejar modificar o mercado do PPV

            $tabela = 'ppv_teams'; // Define a tabela a ser modificada
            $coluna = 'statusMercadoPPV'; // Define a coluna de configurações que será modificada
        }

        $quantidade = DB::table($tabela)->count('id'); // Define a quantidade de times que existem na tabela

        // Caso a ação seja para abrir o Mercado
        $statusAtual = DB::table('configs')->first();
        if ($action == $statusAtual->$coluna) {
            return redirect()->route('painelAdmin');
            die();
        }
        if($action == 'Aberto'){
            for ($i=1; $i <=  $quantidade; $i++) { 
                $timeDoUser = DB::table($tabela)->where('user_id',$i)->first();
                if($timeDoUser != NULL){
                    $wcBonus = 0;
                    if($timeDoUser->superstar01 != 103){
                        $wcBonus += 2;
                    }
                    if($timeDoUser->superstar02 != 102){
                        $wcBonus += 2;
                    }
                    if($timeDoUser->superstar03 != 101){
                        $wcBonus += 2;
                    }
                    if($timeDoUser->superstar04 != 100){
                        $wcBonus += 2;
                    }
                    DB::table('users')->where('id',$timeDoUser->user_id)->increment('wc',$wcBonus);
                }
                
            }
            
            DB::table('configs')->update([
                $coluna => $action // Altera o mercado desejado para aberto
            ]);

            $quantidadeSuperstars = DB::table('superstars')->count('id');
            for ($i=1; $i <= $quantidadeSuperstars; $i++) { 
                $superstarDesv = DB::table('superstars')->where('id',$i)->first();
                if($superstarDesv->points == 0.0 && $superstarDesv->last_points == 0.0 && $superstarDesv->last_show == 0 && $superstarDesv->name != 'None'){
                    $desvalorizacao = ($superstarDesv->price * 5) / 100;
                    $desvalorizacao = round($desvalorizacao);
                    if($mercado == 'Raw' && $superstarDesv->brand == 'Raw'){
                        if ($superstarDesv->price - $desvalorizacao <= 500) {
                            DB::table('superstars')
                            ->where('id',$i)
                            ->update([
                                'price' => 500
                            ]);
                        }else{
                            DB::table('superstars')
                            ->where('id',$i)
                            ->decrement('price',$desvalorizacao);
                        }
                    }else if($mercado == 'Smackdown' && $superstarDesv->brand == 'Smackdown'){
                        if ($superstarDesv->price - $desvalorizacao <= 500) {
                            DB::table('superstars')
                            ->where('id',$i)
                            ->update([
                                'price' => 500
                            ]);
                        }else{
                            DB::table('superstars')
                            ->where('id',$i)
                            ->decrement('price',$desvalorizacao);
                        }
                    }else if($mercado == 'PPV'){
                        if ($superstarDesv->price - $desvalorizacao <= 500) {
                            DB::table('superstars')
                            ->where('id',$i)
                            ->update([
                                'price' => 500
                            ]);
                        }else{
                            DB::table('superstars')
                            ->where('id',$i)
                            ->decrement('price',$desvalorizacao);
                        }
                    }
                    
                    
                }
            }
            if($mercado != 'PPV'){ // Caso o mercado não seja de PPV
                // Executa as funções para todos os jogadores
                for ($i=1; $i <= $quantidade ; $i++) { 
                    // Pega os superstars de cada time
                    $team = DB::table($tabela)->where('id',$i)->first();
                    if($team != NULL){
                        $superstar01 = DB::table('superstars')->where('id',$team->superstar01)->value('points');
                        $superstar02 = DB::table('superstars')->where('id',$team->superstar02)->value('points');
                        $superstar03 = DB::table('superstars')->where('id',$team->superstar03)->value('points');
                        $superstar04 = DB::table('superstars')->where('id',$team->superstar04)->value('points');
    
                        $ult_pontos = DB::table($tabela)->where('id',$i)->value('team_total_points'); // Recebe os pontos totais do time
                        $pontos = $superstar01 + $superstar02 + $superstar03 + $superstar04; // Define que os pontos atuais serão a soma dos pontos dos superstars
                        $total_pontos = $ult_pontos + $pontos; // Define que os pontos totais do time serão os anteriores mais os atuais
                        
                        // Atualiza os pontos do jogador
                        DB::table($tabela)->where('id',$i)->update([
                            'team_points' => $pontos,
                            'team_total_points' => $total_pontos
                        ]);
                    }
                           
                }
            }
            else{ // Caso o mercado seja de PPV
                $brand = DB::table('configs')->value('ppvBrand');
                DB::table('ppv_teams')->update([
                    'team_points' => 0
                ]);
                // Executa as funções para todos os jogadores
                for ($i=1; $i <= $quantidade ; $i++) { 
                    // Pega os superstars de cada time e seus preços
                    $team = DB::table('ppv_teams')->where('id',$i)->first();

                    $superstar01 = DB::table('superstars')->where('id',$team->superstar01)->first();
                    $superstar02 = DB::table('superstars')->where('id',$team->superstar02)->first();
                    $superstar03 = DB::table('superstars')->where('id',$team->superstar03)->first();
                    $superstar04 = DB::table('superstars')->where('id',$team->superstar04)->first();
                    
                    $preço1 = $superstar01->price;
                    $preço2 = $superstar02->price;
                    $preço3 = $superstar03->price;
                    $preço4 = $superstar04->price;
                    
                    // Recebe quanto os superstars valorizaram
                    if($superstar01->points <= 2.5){
                        if($preço1 - (100 - $superstar01->points * 10) <= 500){
                            $preço1= 0.0;
                        }else{
                        $preço1 =  - (100 - $superstar01->points * 10);
                        }
                    }else{
                        $preço1 =  ($superstar01->points * 10);
                    }


                    if($superstar02->points <= 2.5){
                        if($preço2 - (100 - $superstar02->points * 10) <= 500){
                            $preço2= 0.0;
                        }else{
                        $preço2 =  - (100 - $superstar01->points * 10);
                        }
                    }else{
                        $preço2 =   ($superstar01->points * 10);
                    }


                    if($superstar03->points <= 2.5){
                        if($preço3 - (100 - $superstar03->points * 10) <= 500){
                            $preço3= 0.0;
                        }else{
                        $preço3 =  - (100 - $superstar01->points * 10);
                        }
                    }else{
                        $preço3 =   ($superstar01->points * 10);
                    }


                    if($superstar04->points <= 2.5){
                        if($preço4 - (100 - $superstar04->points * 10) <= 500){
                            $preço4= 0.0;
                        }else{
                        $preço4 =  - (100 - $superstar01->points * 10);
                        }
                    }else{
                        $preço4 =  + ($superstar01->points * 10);
                    }
                    // Define os novos valores que os times fizeram
                    $valor_ganho = $preço1 + $preço2 + $preço3 + $preço4;
                    $pontos_ganho = $superstar01->points + $superstar02->points + $superstar03->points + $superstar04->points;
                    // Caso a brand for RAW
                    DB::table('raw_teams')->where('user_id',$i)->update([
                        'team_points' => $pontos_ganho,
                    ]);
                    if ($brand == 'Raw') {
                        // Utilize o dinheiro e os pontos feitos no PPV para o RAW
                        $ult_cash = DB::table('raw_teams')->where('id',$i)->value('team_cash');
                        $ult_pontos = DB::table('raw_teams')->where('id',$i)->value('team_total_points');
                        $ult_pontos = $ult_pontos + $pontos_ganho;
                        $ult_cash = $ult_cash + $valor_ganho;
                        DB::table('raw_teams')->where('user_id',$i)->update([
                            'team_cash' => $ult_cash,
                            'team_total_points' => $ult_pontos
                        ]);
                    }else if ($brand == 'Smackdown') { // Caso a brand for SMACKDOWN
                        // Utilize o dinheiro e os pontos feitos no PPV para o SMACKDOWN
                        $ult_pontos = DB::table('smackdown_teams')->where('id',$i)->value('team_total_points');
                        $ult_pontos = $ult_pontos + $pontos_ganho;
                        $ult_cash = DB::table('smackdown_teams')->where('id',$i)->value('team_cash');
                        $ult_cash = $ult_cash + $valor_ganho;
                        DB::table('smackdown_teams')->where('id',$i)->update([
                            'team_cash' => $ult_cash,
                            'team_total_points' => $ult_pontos
                        ]);
                    }else{ // Caso a brand for Both
                        // Utilize o dinheiro e os pontos feitos no PPV para o RAW e SMACKDOWN divididos por dois
                        $ult_pontos_Raw = DB::table('raw_teams')->where('id',$i)->value('team_total_points');
                        $ult_pontos_Smackdown = DB::table('smackdown_teams')->where('id',$i)->value('team_total_points');
                        $pontos_ganho = $pontos_ganho/2;
                        $ult_pontos_Raw = $ult_pontos_Raw + $pontos_ganho;
                        $ult_pontos_Smackdown = $ult_pontos_Smackdown + $pontos_ganho;
                        $valor_ganho = $valor_ganho/2;
                        $ult_cash_Raw = DB::table('raw_teams')->where('id',$i)->value('team_cash');
                        $ult_cash_Smackdown = DB::table('smackdown_teams')->where('id',$i)->value('team_cash');
                        
                        DB::table('raw_teams')->where('id',$i)->update([
                            'team_cash' => $ult_cash_Raw + $valor_ganho,
                            'team_total_points' => $ult_pontos_Raw
                        ]);

                        DB::table('smackdown_teams')->where('id',$i)->update([
                            'team_cash' => $ult_cash_Smackdown + $valor_ganho,
                            'team_total_points' => $ult_pontos_Smackdown
                        ]);
                    }
                    // Resete os pontos feitos para o próximo PPV
                    $timePpvUser = DB::table('ppv_teams')->where('user_id',$i)->first();
                    $pontosAntigo = $timePpvUser->team_total_points + $timePpvUser->team_points;
                    DB::table('ppv_teams')->where('user_id',$i)->update([
                        'team_points' => $pontos_ganho,
                        'team_total_points' => $pontosAntigo
                    ]);
                }
            }
            if ($mercado == 'Raw') { // CASO SEJA RAW
                $topRawTotalPoints = DB::table('raw_teams')
                ->join('users', 'raw_teams.user_id', '=', 'users.id')
                ->orderBy('team_total_points', 'desc')
                ->limit(10)
                ->get();
                
                foreach ($topRawTotalPoints as $userRaw) {
                    DB::table('users')->where('id',$userRaw->id)->increment('wc',5);
                }

            }elseif ($mercado == 'Smackdown') { // CASO SEJA SMACKDOWN
                $topSmackdownTotalPoints = DB::table('smackdown_teams')
                ->join('users', 'smackdown_teams.user_id', '=', 'users.id')
                ->orderBy('team_total_points', 'desc')
                ->limit(10)
                ->get();

                foreach ($topSmackdownTotalPoints as $userSmack) {
                    DB::table('users')->where('id',$userSmack->id)->increment('wc',5);
                }

            }else{ // CASO SEJA PPV
                $brand = DB::table('configs')->value('ppvBrand');
                if ($brand == "Raw") { // CASO O PPV SEJA RAW
                    $topRawTotalPoints = DB::table('raw_teams')
                    ->join('users', 'raw_teams.user_id', '=', 'users.id')
                    ->orderBy('team_total_points', 'desc')
                    ->limit(10)
                    ->get();

                    foreach ($topRawTotalPoints as $userRaw) {
                        DB::table('users')->where('id',$userRaw->id)->increment('wc',5);
                    }

                }elseif ($brand == "Smackdown") { // CASO O PPV SEJA SMACKDOWN
                    $topSmackdownTotalPoints = DB::table('smackdown_teams')
                    ->join('users', 'smackdown_teams.user_id', '=', 'users.id')
                    ->orderBy('team_total_points', 'desc')
                    ->limit(10)
                    ->get();

                    foreach ($topSmackdownTotalPoints as $userSmack) {
                        DB::table('users')->where('id',$userSmack->id)->increment('wc',5);
                    }

                }else { //CASO O PPV SEJA DUAL BRAND
                    $topRawTotalPoints = DB::table('raw_teams')
                    ->join('users', 'raw_teams.user_id', '=', 'users.id')
                    ->orderBy('team_total_points', 'desc')
                    ->limit(10)
                    ->get();
        
                    $topSmackdownTotalPoints = DB::table('smackdown_teams')
                        ->join('users', 'smackdown_teams.user_id', '=', 'users.id')
                        ->orderBy('team_total_points', 'desc')
                        ->limit(10)
                        ->get();
                    
                    foreach ($topRawTotalPoints as $userRaw) {
                        DB::table('users')->where('id',$userRaw->id)->increment('wc',5);
                    }
                    foreach ($topSmackdownTotalPoints as $userSmack) {
                        DB::table('users')->where('id',$userSmack->id)->increment('wc',5);
                    }
                }
            }
        // CASO SEJA DESEJADO FECHAR O MERCADO
            }else{
                // Atualiza a tabela de configs
                DB::table('configs')->update([
                    $coluna => $action
                ]);

                $quantidade = DB::table('superstars')->count('id'); // Recebe a quantidade de superstars
                
                // Caso o Mercado seja PPV
                if ($mercado == 'PPV') {
                    $brand = DB::table('configs')->value('ppvBrand'); // Recebe a brand do ppv
                    if($brand == 'Raw' || $brand == 'Smackdown'){ // Caso a brand do PPV seja ambas
                        for ($i=1; $i <= $quantidade ; $i++) {
                            // Passa os pontos atuais para os últimos pontos, reseta os pontos atuais, 
                            // e determina que os superstars não apareceram no último show 
                            $ult_pontos = DB::table('superstars')->where([
                                ['id',$i],
                                ['brand',$brand],
                            ])->value('last_points');

                            $pontos = DB::table('superstars')->where([
                                ['id',$i],
                                ['brand',$brand],
                            ])->value('points');

                            $last_points = $pontos;
                            DB::table('superstars')->where([
                                ['id',$i],
                                ['brand',$brand]
                            ])->update([
                                'last_points' => $last_points,
                                'points' => 0,
                                'last_show' => 0
                            ]);

                        }
                    }else{ // Caso a Brand seja as duas
                        for ($i=1; $i <= $quantidade ; $i++) {
                            // Passa os pontos atuais para os últimos pontos, reseta os pontos atuais, 
                            // e determina que os superstars não apareceram no último show 
                            $ult_pontos = DB::table('superstars')->where([
                                ['id',$i],
                            ])->value('last_points');

                            $pontos = DB::table('superstars')->where([
                                ['id',$i],
                            ])->value('points');

                            $last_points = $pontos;
                            DB::table('superstars')->where([
                                ['id',$i]
                            ])->update([
                                'last_points' => $last_points,
                                'points' => 0,
                                'last_show' => 0
                            ]);

                        }
                    }
                }else{ // Caso o mercado não seja do PPV
                    // Passa os pontos atuais para os últimos pontos, reseta os pontos atuais, 
                    // e determina que os superstars não apareceram no último show
                    for ($i=1; $i <= $quantidade ; $i++) {

                        $ult_pontos = DB::table('superstars')->where([
                            ['id',$i],
                            ['brand',$mercado],
                        ])->value('last_points');

                        $pontos = DB::table('superstars')->where([
                            ['id',$i],
                            ['brand',$mercado],
                        ])->value('points');

                        $last_points = $pontos;
                        DB::table('superstars')->where([
                            ['id',$i],
                            ['brand',$mercado]
                        ])->update([
                            'points' => 0,
                            'last_points' => $last_points,
                            'last_show' => 0
                        ]);

                    }
                }
            }

        return redirect()->route('editMarketStatusRedirect');
    }
    public function editarPpvBrand(Request $request){

        $this->validate($request,[
            'brand'      => 'required'
        ]);
        
        $brand = $request->brand;
        $userId = Auth::user()->id;

        if($brand == 'Raw'){ //Se o usuário desejar modificar o mercado do RAW
            $tabela = 'raw_teams'; // Define a tabela a ser modificada
        }else if($brand == 'Smackdown'){ // Se o usuário desejar modificar o mercado do SMACKDOWN
            $tabela = 'smackdown_teams'; // Define a tabela a ser modificada
        }

        if ($brand == 'Raw' || $brand == 'Smackdown') {
            $quantidade = DB::table($tabela)->count('id');
            for ($i=1; $i <= $quantidade ; $i++) {
                $team = DB::table($tabela)->where('id',$i)->first();

                $superstar01 = DB::table('superstars')->where('id',$team->superstar01)->first();
                $superstar02= DB::table('superstars')->where('id',$team->superstar02)->first();
                $superstar03 = DB::table('superstars')->where('id',$team->superstar03)->first();
                $superstar04 = DB::table('superstars')->where('id',$team->superstar04)->first();
                
                $ult_cash = DB::table($tabela)->where('id',$i)->value('team_cash');
                $ult_cash = $ult_cash + $superstar01->price + $superstar02->price + $superstar03->price + $superstar04->price; 

                DB::table('ppv_teams')
                    ->where('user_id',$i)
                    ->update([
                        'team_cash' => $ult_cash,
                        'superstar01' => 103,
                        'superstar02' => 102,
                        'superstar03' => 101,
                        'superstar04' => 100
                    ]);
            }

        }else{
            $quantidade = DB::table('ppv_teams')->count('id');
            for ($i=1; $i <= $quantidade ; $i++) { 
                $superstarId01Raw = DB::table('raw_teams')->where('id',$i)->value('superstar01');
                $superstarId02Raw = DB::table('raw_teams')->where('id',$i)->value('superstar02');
                $superstarId03Raw = DB::table('raw_teams')->where('id',$i)->value('superstar03');
                $superstarId04Raw = DB::table('raw_teams')->where('id',$i)->value('superstar04');

                $superstar01Raw = DB::table('superstars')->where('id',$superstarId01Raw)->first();
                $superstar02Raw = DB::table('superstars')->where('id',$superstarId02Raw)->first();
                $superstar03Raw = DB::table('superstars')->where('id',$superstarId03Raw)->first();
                $superstar04Raw = DB::table('superstars')->where('id',$superstarId04Raw)->first();
                
                $superstarId01Smackdown = DB::table('smackdown_teams')->where('id',$i)->value('superstar01');
                $superstarId02Smackdown = DB::table('smackdown_teams')->where('id',$i)->value('superstar02');
                $superstarId03Smackdown = DB::table('smackdown_teams')->where('id',$i)->value('superstar03');
                $superstarId04Smackdown = DB::table('smackdown_teams')->where('id',$i)->value('superstar04');

                $superstar01Smackdown = DB::table('superstars')->where('id',$superstarId01Smackdown)->first();
                $superstar02Smackdown = DB::table('superstars')->where('id',$superstarId02Smackdown)->first();
                $superstar03Smackdown = DB::table('superstars')->where('id',$superstarId03Smackdown)->first();
                $superstar04Smackdown = DB::table('superstars')->where('id',$superstarId04Smackdown)->first();

                $ult_cash_Raw = DB::table('raw_teams')->where('id',$i)->value('team_cash');
                $ult_cash_Raw = $ult_cash_Raw + $superstar01Raw->price + $superstar02Raw->price + $superstar03Raw->price + $superstar04Raw->price;
                
                $ult_cash_Smackdown = DB::table('smackdown_teams')->where('id',$i)->value('team_cash');
                $ult_cash_Smackdown = $ult_cash_Smackdown + $superstar01Smackdown->price + $superstar02Smackdown->price + $superstar03Smackdown->price + $superstar04Smackdown->price;
                
                $granaTotal = $ult_cash_Raw + $ult_cash_Smackdown;
                $grana = $granaTotal/2;

                DB::table('ppv_teams')
                    ->where('user_id',$i)
                    ->update([
                        'team_cash' => $grana,
                        'superstar01' => 103,
                        'superstar02' => 102,
                        'superstar03' => 101,
                        'superstar04' => 100
                    ]);
            }
        }
        
        DB::table('configs')->update([
            'ppvBrand' => $request->brand
        ]);
        return redirect()->route('editPpvBrandRedirect');
    }

    public function editarPpvVisibilidade(Request $request){
        // Início da Validação
            // Valida os campo de ação
            $this->validate($request,[
                    'acao'      => 'required'
            ]);
        // Fim da Validação
        // Atualiza a tabela
        DB::table('configs')->update(['statusMercadoPPV' => $request->acao]);
        return redirect()->route('editPpvVisibilityRedirect');
    }

    public function editarPpvNome(Request $request){
        $this->validate($request,[
            'name' => 'required|max:19'
        ]);
        DB::table('configs')->update([
            'ppvName' => $request->name
        ]);
        return redirect()->route('editPpvNameRedirect');
    }
    
    
}
