<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\superstar;
use App\Models\league;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Hash;

class LeagueController extends Controller
{
    public function liga(){
        $userId = Auth::user()->id;
        $user = DB::table('users')->where('id',$userId)->first();
        $userHasLeague;
        $idLeague =$user->id_league;
        if($idLeague > 1){
            $league = DB::table('leagues')->where('id',$idLeague)->first();
            $userHasLeague = true;
            $quantidade = DB::table('users')->where('id_league',$idLeague)->count();
            $membrosRaw = DB::table('users')
                     ->join('raw_teams', 'users.id', '=', 'raw_teams.user_id')
                     ->where('id_league',$idLeague)->take($quantidade)
                     //->orderBy('team_points', 'desc')
                     ->get();
            $membrosSmackdown = DB::table('users')
                     ->join('smackdown_teams', 'users.id', '=', 'smackdown_teams.user_id')
                     ->where('id_league',$idLeague)->take($quantidade)
                     //->orderBy('team_points', 'desc')
                     ->get();
            /*$membrosPpv = DB::table('users')
                     ->join('ppv_teams', 'users.id', '=', 'ppv_teams.user_id')
                     ->where('id_league',$idLeague)->take($quantidade)
                     //->orderBy('team_points', 'desc')
                     ->get();*/
            

        }else{
            $userHasLeague = false;
        }

        return view('leagueHome',[
        'userHasLeague' => $userHasLeague,
        'membrosRaw' => $membrosRaw,
        'membrosSmackdown' => $membrosSmackdown
        ]);
    }
    public function ligaPontosSemanais(){
        $userId = Auth::user()->id;
        $user = DB::table('users')->where('id',$userId)->first();
        $idLeague =$user->id_league;
        $league = DB::table('leagues')->where('id',$idLeague)->first();
        $quantidade = DB::table('users')->where('id_league',$idLeague)->count();
        $membrosRaw = DB::table('users')
                    ->join('raw_teams', 'users.id', '=', 'raw_teams.user_id')
                    ->where('id_league',$idLeague)->take($quantidade)
                    ->orderBy('team_points', 'desc')
                    ->get();
        $membrosSmackdown = DB::table('users')
                    ->join('smackdown_teams', 'users.id', '=', 'smackdown_teams.user_id')
                    ->where('id_league',$idLeague)->take($quantidade)
                    ->orderBy('team_points', 'desc')
                    ->get();
        /*$membrosPpv = DB::table('users')
                    ->join('ppv_teams', 'users.id', '=', 'ppv_teams.user_id')
                    ->where('id_league',$idLeague)->take($quantidade)
                    //->orderBy('team_points', 'desc')
                    ->get();*/
        
        return view('leagueHome',[
        'membrosRaw' => $membrosRaw,
        'membrosSmackdown' => $membrosSmackdown
        ]);
    }
    public function ligaPontosTotais(){
        $userId = Auth::user()->id;
        $user = DB::table('users')->where('id',$userId)->first();
        $idLeague =$user->id_league;
        $league = DB::table('leagues')->where('id',$idLeague)->first();
        $quantidade = DB::table('users')->where('id_league',$idLeague)->count();
        $membrosRaw = DB::table('users')
                    ->join('raw_teams', 'users.id', '=', 'raw_teams.user_id')
                    ->where('id_league',$idLeague)->take($quantidade)
                    ->orderBy('team_total_points', 'desc')
                    ->get();
        $membrosSmackdown = DB::table('users')
                    ->join('smackdown_teams', 'users.id', '=', 'smackdown_teams.user_id')
                    ->where('id_league',$idLeague)->take($quantidade)
                    ->orderBy('team_total_points', 'desc')
                    ->get();
        /*$membrosPpv = DB::table('users')
                    ->join('ppv_teams', 'users.id', '=', 'ppv_teams.user_id')
                    ->where('id_league',$idLeague)->take($quantidade)
                    //->orderBy('team_points', 'desc')
                    ->get();*/
        
        return view('leagueHome',[
        'membrosRaw' => $membrosRaw,
        'membrosSmackdown' => $membrosSmackdown
        ]);
    }
    public function criarLiga(Request $request){
        // Autenticação
        $this->validate($request,[
            'name'      => 'required|max:25',
            'secret_password' => 'required'
        ]);
        $userId = Auth::user()->id;
        $league = league::create([
            'league_name' => $request->name,
            'secret_password' => bcrypt('$request->secret_password'),
            'owner' => $userId
        ]);
        DB::table('users')
            ->where('id',$userId)
            ->update([
                'id_league' => $league->id
            ]);

    }
    public function entrarLiga(Request $request){
        // Autenticação
        $this->validate($request,[
            'name'      => 'required',
            'secret_password' => 'required'
        ]);
        $league = DB::table('leagues')
            ->where('league_name', $request->name)
            ->first();
        if (Hash::check($request->secret_password, $league->secret_password)) {
            
            $userId = Auth::user()->id;

            if ($league->member01 == 2) {
                    
                DB::table('users')
                    ->where('id',$userId)
                    ->update(['league_id' => $league->id]);
                DB::table('leagues')
                    ->where('id',$league->id)
                    ->update(['member1' => $userId]);

                    
            }else if ($league->member02 == 3) {

                DB::table('users')
                    ->where('id',$userId)
                    ->update(['league_id' => $league->id]);
                DB::table('leagues')
                    ->where('id',$league->id)
                    ->update(['member2' => $userId]);

            }else if ($league->member03 == 4) {

                DB::table('users')
                    ->where('id',$userId)
                    ->update(['league_id' => $league->id]);
                DB::table('leagues')
                    ->where('id',$league->id)
                    ->update(['member3' => $userId]);

            }else if ($league->member04 == 5) {

                DB::table('users')
                    ->where('id',$userId)
                    ->update(['league_id' => $league->id]);
                DB::table('leagues')
                    ->where('id',$league->id)
                    ->update(['member4' => $userId]);

            }else{
                //NÃO HÁ VAGAS
                return redirect()->route('leagueHome');
            }
        }else{
            //NÃO ACERTOU A PALAVRA CHAVE
            return redirect()->route('leagueHome');
        }
        return redirect()->route('leagueHome');
    }
    public function mudarNomeLiga(Request $request){
        // Autenticação
        $this->validate($request,[
            'name'      => 'required',
            'secret_password' => 'required'
        ]);
        $userId = Auth::user()->id;
        $user = DB::table('users')
            ->where('id', $userId)
            ->first();
        $league = DB::table('leagues')
            ->where('id', $user->id_league)
            ->first();
        if($league->owner == $userId){  
            if (Hash::check($request->secret_password, $league->secret_password)) {
                DB::table('leagues')
                ->where('id',$league->id)
                ->update(['name' => $request->name]);   
                
                return redirect()->route('leagueHome');
            }
            return redirect()->route('leagueHome');
        }
    }
    public function mudarSecretPassword(Request $request){
        // Autenticação
        $this->validate($request,[
            'secret_password_old' => 'required',
            'secret_password' => 'required'
        ]);
        $userId = Auth::user()->id;
        $user = DB::table('users')
            ->where('id', $userId)
            ->first();
        $league = DB::table('leagues')
            ->where('id', $user->id_league)
            ->first();
        if($league->owner == $userId){
            if (Hash::check($request->secret_password_old, $league->secret_password)) {
                DB::table('leagues')
                ->where('id',$league->id)
                ->update(['secret_password' => bcrypt($request->secret_passowrd)]);   
                
                return redirect()->route('leagueHome');
            }
            return redirect()->route('leagueHome');
        }
    }
    public function removerMembro(Request $request){
        // Autenticação
        $this->validate($request,[
            'email' => 'required',
            'secret_password' => 'required'
        ]);
        $userId = Auth::user()->id;
        $user = DB::table('users')
            ->where('id', $userId)
            ->first();
        $league = DB::table('leagues')
            ->where('id', $user->id_league)
            ->first();
        $userRemover = DB::table('users')
            ->where('email', $userId)
            ->first();
        if($league->owner == $userId){
            if (Hash::check($request->secret_password_old, $league->secret_password)) {
                if ($league->member01 == $userRemover->id) {
                        
                    DB::table('users')
                        ->where('id',$userRemover->id)
                        ->update(['league_id' => 1]);
                    DB::table('leagues')
                        ->where('id',$league->id)
                        ->update(['member1' => 2]);

                        
                }else if ($league->member02 == $userRemover->id) {

                    DB::table('users')
                        ->where('id',$userRemover->id)
                        ->update(['league_id' => 1]);
                    DB::table('leagues')
                        ->where('id',$league->id)
                        ->update(['member2' => 2]);

                }else if ($league->member03 == $userRemover->id) {

                    DB::table('users')
                        ->where('id',$userRemover->id)
                        ->update(['league_id' => 1]);
                    DB::table('leagues')
                        ->where('id',$league->id)
                        ->update(['member3' => 2]);

                }else if ($league->member04 == $userRemover->id) {

                    DB::table('users')
                        ->where('id',$userRemover->id)
                        ->update(['league_id' => 1]);
                    DB::table('leagues')
                        ->where('id',$league->id)
                        ->update(['member1' => 4]);

                }else{
                    //NÃO HÁ VAGAS
                    return redirect()->route('leagueHome');
                }
        }
            return redirect()->route('leagueHome');
        }
        
    }

}
