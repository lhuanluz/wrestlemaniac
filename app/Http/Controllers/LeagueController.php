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
            $liga = DB::table('leagues')->where('id',$idLeague)->first();
            $userHasLeague = true;
            $quantidade = DB::table('users')->where('id_league',$idLeague)->count();
            $positionLeague = DB::table('leagues')->orderBy('league_points', 'desc')->pluck('id')->toArray();
            $dono = DB::table('users')->where('id',$liga->owner)->first();
            $membro1 = DB::table('users')->where('id',$liga->member1)->first();
            $membro2 = DB::table('users')->where('id',$liga->member2)->first();
            $membro3 = DB::table('users')->where('id',$liga->member3)->first();
            $membro4 = DB::table('users')->where('id',$liga->member4)->first();
            $membrosRaw = DB::table('users')
                     ->join('raw_teams', 'users.id', '=', 'raw_teams.user_id')
                     ->where('id_league',$idLeague)->take($quantidade)
                     ->orderBy('team_total_points','desc')
                     ->get();
            $membrosSmackdown = DB::table('users')
                     ->join('smackdown_teams', 'users.id', '=', 'smackdown_teams.user_id')
                     ->where('id_league',$idLeague)->take($quantidade)
                     ->orderBy('team_total_points','desc')
                     ->get();
            $membrosPPV = DB::table('users')
                     ->join('ppv_teams', 'users.id', '=', 'ppv_teams.user_id')
                     ->where('id_league',$idLeague)->take($quantidade)
                     ->orderBy('team_total_points','desc')
                     ->get();
            $membros = DB::table('users')
                     ->where('id_league',$idLeague)->take($quantidade)
                     ->orderBy('name','asc')
                     ->get();


            return view('leagueHome',[
            'userHasLeague' => $userHasLeague,
            'liga' => $liga,
            'positionLeague' => $positionLeague,
            'dono' => $dono,
            'membro1' => $membro1,
            'membro2' => $membro2,
            'membro3' => $membro3,
            'membro4' => $membro4,
            'membrosRaw' => $membrosRaw,
            'membrosSmackdown' => $membrosSmackdown,
            'membrosPPV' => $membrosPPV,
            'membros' => $membros
            ]);

        }else{
            $userHasLeague = false;
            return view('leagueHome',[
            'userHasLeague' => $userHasLeague]);
        }
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
            'secret_password' => 'required|confirmed',
            'secret_password_confirmation' => 'required'
        ]);
        $userId = Auth::user()->id;
        $league = league::create([
            'league_name' => $request->name,
            'secret_password' => Hash::make($request->secret_password),
            'owner' => $userId
        ]);
        DB::table('users')
            ->where('id',$userId)
            ->update([
                'id_league' => $league->id
            ]);
        return redirect()->route('leagueHome');

    }
    public function entrarLiga(Request $request){
        // Autenticação
        $this->validate($request,[
            'name'      => 'required',
            'secret_password' => 'required'
        ]);
        $league = DB::table('leagues')
            ->where('league_name',$request->name)
            ->first();
            
        if (Hash::check('123123', $league->secret_password)) {
            
            $userId = Auth::user()->id;

            if ($league->member1 == 2) {
                    
                DB::table('users')
                    ->where('id',$userId)
                    ->update(['id_league' => $league->id]);
                DB::table('leagues')
                    ->where('id',$league->id)
                    ->update(['member1' => $userId]);

                    
            }else if ($league->member2 == 3) {

                DB::table('users')
                    ->where('id',$userId)
                    ->update(['id_league' => $league->id]);
                DB::table('leagues')
                    ->where('id',$league->id)
                    ->update(['member2' => $userId]);

            }else if ($league->member3 == 4) {

                DB::table('users')
                    ->where('id',$userId)
                    ->update(['id_league' => $league->id]);
                DB::table('leagues')
                    ->where('id',$league->id)
                    ->update(['member3' => $userId]);

            }else if ($league->member4 == 5) {

                DB::table('users')
                    ->where('id',$userId)
                    ->update(['id_league' => $league->id]);
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
                if ($league->member1 == $userRemover->id) {
                        
                    DB::table('users')
                        ->where('id',$userRemover->id)
                        ->update(['id_league' => 1]);
                    DB::table('leagues')
                        ->where('id',$league->id)
                        ->update(['member1' => 2]);

                        
                }else if ($league->member2 == $userRemover->id) {

                    DB::table('users')
                        ->where('id',$userRemover->id)
                        ->update(['id_league' => 1]);
                    DB::table('leagues')
                        ->where('id',$league->id)
                        ->update(['member2' => 2]);

                }else if ($league->member3 == $userRemover->id) {

                    DB::table('users')
                        ->where('id',$userRemover->id)
                        ->update(['id_league' => 1]);
                    DB::table('leagues')
                        ->where('id',$league->id)
                        ->update(['member3' => 2]);

                }else if ($league->member4 == $userRemover->id) {

                    DB::table('users')
                        ->where('id',$userRemover->id)
                        ->update(['id_league' => 1]);
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
    public function sairLiga(){
        $userId = Auth::user()->id;
        $idLeague = Auth::user()->id_league;
        $league = DB::table('leagues')
            ->where('id', $idLeague)
            ->first();
        if ($league->member1 == $userId) {
                        
                    DB::table('users')
                        ->where('id',$userId)
                        ->update(['id_league' => 1]);
                    DB::table('leagues')
                        ->where('id',$league->id)
                        ->update(['member1' => 2]);

                        
                }else if ($league->member2 == $userId) {

                    DB::table('users')
                        ->where('id',$userId)
                        ->update(['id_league' => 1]);
                    DB::table('leagues')
                        ->where('id',$league->id)
                        ->update(['member2' => 2]);

                }else if ($league->member3 == $userId) {

                    DB::table('users')
                        ->where('id',$userId)
                        ->update(['id_league' => 1]);
                    DB::table('leagues')
                        ->where('id',$league->id)
                        ->update(['member3' => 2]);

                }else if ($league->member4 == $userId) {

                    DB::table('users')
                        ->where('id',$userId)
                        ->update(['id_league' => 1]);
                    DB::table('leagues')
                        ->where('id',$league->id)
                        ->update(['member1' => 4]);

                }else{
                    //DONO
                    return redirect()->route('leagueHome');
                }
        return redirect()->route('leagueHome');
    }

}
