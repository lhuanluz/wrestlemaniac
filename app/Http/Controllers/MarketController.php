<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\superstar;
use Illuminate\Support\Facades\DB;
use Auth;

class MarketController extends Controller
{
    
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
    
    
}
