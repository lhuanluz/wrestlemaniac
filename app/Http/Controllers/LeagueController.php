<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\superstar;
use Illuminate\Support\Facades\DB;
use Auth;

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
            // MEMBROS DA LIGA
            $owner = DB::table('users')->where('id',$league->owner)->first();
            $member1 = DB::table('users')->where('id',$league->member1)->first();
            $member2 = DB::table('users')->where('id',$league->member2)->first();
            $member3 = DB::table('users')->where('id',$league->member3)->first();
            $member4 = DB::table('users')->where('id',$league->member4)->first();

        }else{
            $userHasLeague = false;
        }

        return view('leagueHome',[
        'userHasLeague' => $userHasLeague,
        'membrosRaw' => $membrosRaw
        ]);
    }
}
