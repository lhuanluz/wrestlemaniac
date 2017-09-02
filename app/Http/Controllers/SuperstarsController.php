<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\superstar;
use Illuminate\Support\Facades\DB;
use Auth;

class SuperstarsController extends Controller
{
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
        $superstar = DB::table('superstars')
                    ->where('name',$request->name)
                    ->first();
        DB::table('raw_teams')
            ->where('superstar01',$superstar->id)
            ->update([
                'superstar01' => 103
            ])->increment('team_cash', $superstar->price);
        DB::table('raw_teams')
            ->where('superstar02',$superstar->id)
            ->update([
                'superstar02' => 102
            ])->increment('team_cash', $superstar->price);
        DB::table('raw_teams')
            ->where('superstar03',$superstar->id)
            ->update([
                'superstar03' => 101
            ])->increment('team_cash', $superstar->price);
        DB::table('raw_teams')
            ->where('superstar04',$superstar->id)
            ->update([
                'superstar04' => 100
            ])->increment('team_cash', $superstar->price);
        DB::table('smackdown_teams')
            ->where('superstar01',$superstar->id)
            ->update([
                'superstar01' => 103
            ])->increment('team_cash', $superstar->price);
        DB::table('smackdown_teams')
            ->where('superstar02',$superstar->id)
            ->update([
                'superstar02' => 102
            ])->increment('team_cash', $superstar->price);
        DB::table('smackdown_teams')
            ->where('superstar03',$superstar->id)
            ->update([
                'superstar03' => 101
            ])->increment('team_cash', $superstar->price);
        DB::table('smackdown_teams')
            ->where('superstar04',$superstar->id)
            ->update([
                'superstar04' => 100
            ])->increment('team_cash', $superstar->price);
        DB::table('superstars')
            ->where('name', $request->name)
            ->update([
                'brand' => $request->brand
                ]);
        return redirect()->route('painelAdmin');
    }


}
