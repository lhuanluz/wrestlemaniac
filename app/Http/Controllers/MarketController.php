<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\superstar;
use Illuminate\Support\Facades\DB;
use Auth;

class MarketController extends Controller
{
    public function mercadoStatusRedirect(){
        if (Auth::guest()) {
            return redirect()->route('inicio');
        }else{
            return view('mercadoStatus');
        }
        
    }
    public function editarPpvRedirect(){
        if (Auth::guest()) {
            return redirect()->route('inicio');
        }else{
            return view('editarPPV');
        }
    }
    public function mercadoStatus(Request $request){
        $this->validate($request,[
            'market'      => 'required',
             'action'    => 'required'
        ]);
        $mercado = $request->market;
        $action = $request->action;
        
        if($mercado == 'Raw'){
            $tabela = 'raw_teams';
            $coluna = 'statusMercadoRaw';
        }else if($mercado == 'Smackdown'){
            $tabela = 'smackdown_teams';
            $coluna = 'statusMercadoSmackdown';
        }else{
            $tabela = 'ppv_teams';
            $coluna = 'statusMercadoPPV';
        }
        $quantidade = DB::table($tabela)->count('id');
        if($action == 'Aberto'){
                DB::table('configs')->update([
                    $coluna => $action
                ]);
                for ($i=1; $i <= $quantidade ; $i++) { 
                    $superstarId01 = DB::table($tabela)->where('id',$i)->value('superstar01');
                    $superstarId02 = DB::table($tabela)->where('id',$i)->value('superstar02');
                    $superstarId03 = DB::table($tabela)->where('id',$i)->value('superstar03');
                    $superstarId04 = DB::table($tabela)->where('id',$i)->value('superstar04');

                    $superstar01 = DB::table('superstars')->where('id',$superstarId01)->value('points');
                    $superstar02 = DB::table('superstars')->where('id',$superstarId02)->value('points');
                    $superstar03 = DB::table('superstars')->where('id',$superstarId03)->value('points');
                    $superstar04 = DB::table('superstars')->where('id',$superstarId04)->value('points');

                    $ult_pontos = DB::table($tabela)->where('id',$i)->value('team_total_points');
                    $pontos = $superstar01 + $superstar02 +$superstar03 +$superstar04;
                    $total_pontos = $ult_pontos + $pontos;

                    DB::table($tabela)->where('id',$i)->update([
                        'team_points' => $pontos,
                        'team_total_points' => $total_pontos
                    ]);                
                }
                if($mercado == 'PPV'){
                    $brand = DB::table('configs')->value('ppvBrand');
                    for ($i=1; $i <= $quantidade ; $i++) { 
                        $superstarId01 = DB::table('ppv_teams')->where('id',$i)->value('superstar01');
                        $superstarId02 = DB::table('ppv_teams')->where('id',$i)->value('superstar02');
                        $superstarId03 = DB::table('ppv_teams')->where('id',$i)->value('superstar03');
                        $superstarId04 = DB::table('ppv_teams')->where('id',$i)->value('superstar04');

                        $superstar01 = DB::table('superstars')->where('id',$superstarId01)->first();
                        $superstar02 = DB::table('superstars')->where('id',$superstarId02)->first();
                        $superstar03 = DB::table('superstars')->where('id',$superstarId03)->first();
                        $superstar04 = DB::table('superstars')->where('id',$superstarId04)->first();

                        $preço1 = $superstar01->price;
                        $preço2 = $superstar02->price;
                        $preço3 = $superstar03->price;
                        $preço4 = $superstar04->price;

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

                        $valor_ganho = $preço1 + $preço2 + $preço3 + $preço4;
                        $pontos_ganho = $superstar01->points + $superstar02->points + $superstar03->points + $superstar04->points;
                        if ($brand == 'Raw') {
                            
                            $ult_cash = DB::table('raw_teams')->where('id',$i)->value('team_cash');
                            $ult_pontos = DB::table('raw_teams')->where('id',$i)->value('team_total_points');
                            $ult_pontos = $ult_pontos + $pontos_ganho;
                            $ult_cash = $ult_cash + $valor_ganho;
                            DB::table('raw_teams')->where('user_id',$i)->update([
                                'team_cash' => $ult_cash,
                                'team_total_points' => $ult_pontos
                            ]);
                        }else if ($brand == 'Smackdown') {
                            $ult_pontos = DB::table('smackdown_teams')->where('id',$i)->value('team_total_points');
                            $ult_pontos = $ult_pontos + $pontos_ganho;
                            $ult_cash = DB::table('smackdown_teams')->where('id',$i)->value('team_cash');
                            $ult_cash = $ult_cash + $valor_ganho;
                            DB::table('smackdown_teams')->where('id',$i)->update([
                                'team_cash' => $ult_cash,
                                'team_total_points' => $ult_pontos
                            ]);
                        }else {
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
                        DB::table('ppv_teams')->where('user_id',$i)->update([
                            'superstar01' => 999,
                            'superstar02' => 998,
                            'superstar03' => 997,
                            'superstar04' => 996,
                            'team_points' => 0.0,
                            'team_total_points' => 0.0
                        ]);
                    }
                }
            }else{
                DB::table('configs')->update([
                    $coluna => $action
                ]);

                $quantidade = DB::table('superstars')->count('id');

                if ($mercado == 'PPV') {
                    $brand = DB::table('configs')->value('ppvBrand');
                    if($brand == 'Raw' || $brand == 'Smackdown'){
                        for ($i=1; $i <= $quantidade ; $i++) {

                            $ult_pontos = DB::table('superstars')->where([
                                ['id',$i],
                                ['brand',$brand],
                                ['last_show',1]
                            ])->value('last_points');

                            $pontos = DB::table('superstars')->where([
                                ['id',$i],
                                ['brand',$brand],
                                ['last_show',1]
                            ])->value('points');

                            $last_points = $ult_pontos + $pontos;
                            DB::table('superstars')->where([
                                ['id',$i],
                                ['brand',$brand],
                                ['last_show',1]
                            ])->update([
                                'points' => 0,
                                'last_points' => $last_points,
                                'last_show' => 0
                            ]);

                        }
                    }else{
                        for ($i=1; $i <= $quantidade ; $i++) {

                            $ult_pontos = DB::table('superstars')->where([
                                ['id',$i],
                                ['last_show',1]
                            ])->value('last_points');

                            $pontos = DB::table('superstars')->where([
                                ['id',$i],
                                ['last_show',1]
                            ])->value('points');

                            $last_points = $pontos;
                            DB::table('superstars')->where([
                                ['id',$i],
                                ['last_show',1]
                            ])->update([
                                'points' => 0,
                                'last_points' => $last_points,
                                'last_show' => 0
                            ]);

                        }
                    }
                    

                }else{

                     for ($i=1; $i <= $quantidade ; $i++) {

                    $ult_pontos = DB::table('superstars')->where([
                        ['id',$i],
                        ['brand',$mercado],
                        ['last_show',1]
                    ])->value('last_points');

                    $pontos = DB::table('superstars')->where([
                        ['id',$i],
                        ['brand',$mercado],
                        ['last_show',1]
                    ])->value('points');

                    $last_points = $pontos;
                    DB::table('superstars')->where([
                        ['id',$i],
                        ['brand',$mercado],
                        ['last_show',1]
                    ])->update([
                        'points' => 0,
                        'last_points' => $last_points,
                        'last_show' => 0
                    ]);

                    }
                }
                
                
                
               
            }
        

        return redirect()->route('painelAdmin');
    }
    public function editarPpv(Request $request){
        $this->validate($request,[
            'brand'      => 'required'
        ]);
        
        $brand = $request->brand;
        $userId = Auth::user()->id;
        if ($brand == 'Raw') {
            $quantidade = DB::table('raw_teams')->count('id');
            for ($i=1; $i <= $quantidade ; $i++) {
                $superstarId01Raw = DB::table('raw_teams')->where('id',$i)->value('superstar01');
                $superstarId02Raw = DB::table('raw_teams')->where('id',$i)->value('superstar02');
                $superstarId03Raw = DB::table('raw_teams')->where('id',$i)->value('superstar03');
                $superstarId04Raw = DB::table('raw_teams')->where('id',$i)->value('superstar04');

                $superstar01Raw = DB::table('superstars')->where('id',$superstarId01Raw)->first();
                $superstar02Raw = DB::table('superstars')->where('id',$superstarId02Raw)->first();
                $superstar03Raw = DB::table('superstars')->where('id',$superstarId03Raw)->first();
                $superstar04Raw = DB::table('superstars')->where('id',$superstarId04Raw)->first();
                
                $ult_cash = DB::table('raw_teams')->where('id',$i)->value('team_cash');
                $ult_cash = $ult_cash + $superstar01Raw->price + $superstar02Raw->price = $superstar03Raw->price + $superstar04Raw->price; 

                DB::table('ppv_teams')
                    ->where('user_id',$i)
                    ->update([
                        'team_cash' => $ult_cash
                    ]);
            }

        }else if ($brand == 'Smackdown') {
            $quantidade = DB::table('smackdown_teams')->count('id');
            for ($i=1; $i <= $quantidade ; $i++) {
                $superstarId01Smackdown = DB::table('smackdown_teams')->where('id',$i)->value('superstar01');
                $superstarId02Smackdown = DB::table('smackdown_teams')->where('id',$i)->value('superstar02');
                $superstarId03Smackdown = DB::table('smackdown_teams')->where('id',$i)->value('superstar03');
                $superstarId04Smackdown = DB::table('smackdown_teams')->where('id',$i)->value('superstar04');

                $superstar01Smackdown = DB::table('superstars')->where('id',$superstarId01Smackdown)->first();
                $superstar02Smackdown = DB::table('superstars')->where('id',$superstarId02Smackdown)->first();
                $superstar03Smackdown = DB::table('superstars')->where('id',$superstarId03Smackdown)->first();
                $superstar04Smackdown = DB::table('superstars')->where('id',$superstarId04Smackdown)->first();
                
                $ult_cash = DB::table('smackdown_teams')->where('id',$i)->value('team_cash');
                $ult_cash = $ult_cash + $superstar01Smackdown->price + $superstar02Smackdown->price = $superstar03Smackdown->price + $superstar04Smackdown->price; 

                DB::table('ppv_teams')
                    ->where('user_id',$i)
                    ->update([
                        'team_cash' => $ult_cash
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
                $ult_cash_Raw = $ult_cash_Raw + $superstar01Raw->price + $superstar02Raw->price = $superstar03Raw->price + $superstar04Raw->price;
                
                $ult_cash_Smackdown = DB::table('smackdown_teams')->where('id',$i)->value('team_cash');
                $ult_cash_Smackdown = $ult_cash_Smackdown + $superstar01Smackdown->price + $superstar02Smackdown->price = $superstar03Smackdown->price + $superstar04Smackdown->price;
                
                $granaTotal = $ult_cash_Raw + $ult_cash_Smackdown;
                $grana = $granaTotal/2;

                DB::table('ppv_teams')
                    ->where('user_id',$i)
                    ->update([
                        'team_cash' => $grana
                    ]);
            }
        }
        
        DB::table('configs')->update([
            'ppvBrand' => $request->brand
        ]);
        return redirect()->route('painelAdmin');
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
        
        if ($userTeam->superstar01 == 999){
            DB::table('raw_teams')
                ->where('user_id',$userId)
                ->update([
                'superstar01' => $superstar->id,
                'team_cash' => $userTeam->team_cash - $superstar->price
                ]);
        }else if ($userTeam->superstar02 == 998){
            DB::table('raw_teams')
                ->where('user_id',$userId)
                ->update([
                'superstar02' => $superstar->id,
                'team_cash' => $userTeam->team_cash - $superstar->price
                ]);
        }else if ($userTeam->superstar03 == 997){
            DB::table('raw_teams')
                ->where('user_id',$userId)
                ->update([
                'superstar03' => $superstar->id,
                'team_cash' => $userTeam->team_cash - $superstar->price
                ]);
        }
        else if ($userTeam->superstar04 == 996){
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
        
        if ($userTeam->superstar01 == 999){
            DB::table('smackdown_teams')
                ->where('user_id',$userId)
                ->update([
                'superstar01' => $superstar->id,
                'team_cash' => $userTeam->team_cash - $superstar->price
                ]);
        }else if ($userTeam->superstar02 == 998){
            DB::table('smackdown_teams')
                ->where('user_id',$userId)
                ->update([
                'superstar02' => $superstar->id,
                'team_cash' => $userTeam->team_cash - $superstar->price
                ]);
        }else if ($userTeam->superstar03 == 997){
            DB::table('smackdown_teams')
                ->where('user_id',$userId)
                ->update([
                'superstar03' => $superstar->id,
                'team_cash' => $userTeam->team_cash - $superstar->price
                ]);
        }
        else if ($userTeam->superstar04 == 996){
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
    public function venderSuperstarSmackdown(Request $request){
        $userId = Auth::user()->id;

        $superstar = DB::table('superstars')
                    ->where('name',$request->name)
                    ->first();
        $userTeam = DB::table('smackdown_teams')
                    ->where('user_id',$userId)
                    ->first();
        if ($userTeam->superstar01 == $superstar->id){
             DB::table('smackdown_teams')
                ->where('user_id',$userId)
                ->update([
                'superstar01' => 999,
                'team_cash' => $userTeam->team_cash + $superstar->price
                ]);
        }else if ($userTeam->superstar02 == $superstar->id){
             DB::table('smackdown_teams')
                ->where('user_id',$userId)
                ->update([
                'superstar02' => 998,
                'team_cash' => $userTeam->team_cash + $superstar->price
                ]);
        }else if ($userTeam->superstar03 == $superstar->id){
             DB::table('smackdown_teams')
                ->where('user_id',$userId)
                ->update([
                'superstar03' => 997,
                'team_cash' => $userTeam->team_cash + $superstar->price
                ]);
        }else if ($userTeam->superstar04 == $superstar->id){
             DB::table('smackdown_teams')
                ->where('user_id',$userId)
                ->update([
                'superstar04' => 996,
                'team_cash' => $userTeam->team_cash + $superstar->price
                ]);
        }else{
            echo 'Erro';
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
        
        if ($userTeam->superstar01 == 999){
            DB::table('ppv_teams')
                ->where('user_id',$userId)
                ->update([
                'superstar01' => $superstar->id,
                'team_cash' => $userTeam->team_cash - $superstar->price
                ]);
        }else if ($userTeam->superstar02 == 998){
            DB::table('ppv_teams')
                ->where('user_id',$userId)
                ->update([
                'superstar02' => $superstar->id,
                'team_cash' => $userTeam->team_cash - $superstar->price
                ]);
        }else if ($userTeam->superstar03 == 997){
            DB::table('ppv_teams')
                ->where('user_id',$userId)
                ->update([
                'superstar03' => $superstar->id,
                'team_cash' => $userTeam->team_cash - $superstar->price
                ]);
        }
        else if ($userTeam->superstar04 == 996){
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
    public function venderSuperstarPpv(Request $request){
        $userId = Auth::user()->id;

        $superstar = DB::table('superstars')
                    ->where('name',$request->name)
                    ->first();
        $userTeam = DB::table('ppv_teams')
                    ->where('user_id',$userId)
                    ->first();
        if ($userTeam->superstar01 == $superstar->id){
             DB::table('ppv_teams')
                ->where('user_id',$userId)
                ->update([
                'superstar01' => 999,
                'team_cash' => $userTeam->team_cash + $superstar->price
                ]);
        }else if ($userTeam->superstar02 == $superstar->id){
             DB::table('ppv_teams')
                ->where('user_id',$userId)
                ->update([
                'superstar02' => 998,
                'team_cash' => $userTeam->team_cash + $superstar->price
                ]);
        }else if ($userTeam->superstar03 == $superstar->id){
             DB::table('ppv_teams')
                ->where('user_id',$userId)
                ->update([
                'superstar03' => 997,
                'team_cash' => $userTeam->team_cash + $superstar->price
                ]);
        }else if ($userTeam->superstar04 == $superstar->id){
             DB::table('ppv_teams')
                ->where('user_id',$userId)
                ->update([
                'superstar04' => 996,
                'team_cash' => $userTeam->team_cash + $superstar->price
                ]);
        }else{
            echo 'Erro';
        }
        return redirect()->route('mercadoPpvHome');
    }
}
