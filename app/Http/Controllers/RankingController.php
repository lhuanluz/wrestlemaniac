<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\superstar;
use Illuminate\Support\Facades\DB;
use Auth;

class RankingController extends Controller
{
    public function statistics(){
            /*$topRawPoints = DB::table('raw_teams')
                ->join('users', 'users.id', '=', 'raw_teams.user_id')
                ->orderBy('team_points', 'desc')
                ->limit(10)
                ->get();*/

            /*$topSmackdownPoints = DB::table('smackdown_teams')
                ->join('users', 'users.id', '=', 'smackdown_teams.user_id')
                ->orderBy('team_points', 'desc')
                ->limit(10)
                ->get();*/

            $topRawTotalPoints = DB::table('raw_teams')
                ->join('users', 'users.id', '=', 'raw_teams.user_id')
                ->orderBy('team_total_points', 'desc')
                ->limit(10)
                ->get();

            $topSmackdownTotalPoints = DB::table('smackdown_teams')
                ->join('users', 'users.id', '=', 'smackdown_teams.user_id')
                ->orderBy('team_total_points', 'desc')
                ->limit(10)
                ->get();
            
            $topLeagues = DB::table('leagues')
            ->orderBy('league_points','desc')
            ->limit(10)
            ->get();
        
            $positionLeague = DB::table('leagues')->orderBy('league_points', 'desc')->pluck('id')->toArray(); // Pega a posição/rank da liga por pontos

            $positionRaw = DB::table('raw_teams')->orderBy('team_total_points', 'desc')->pluck('id')->toArray(); // Pega a posição/rank da liga por pontos

            $positionSmack = DB::table('smackdown_teams')->orderBy('team_total_points', 'desc')->pluck('id')->toArray(); // Pega a posição/rank da liga por pontos

                return view('statistics',[
                    'positionSmack' => $positionSmack,
                    'positionRaw' => $positionRaw,
                    'positionLeague' => $positionLeague,
                    'topLeagues' => $topLeagues,
                    'topRawTotalPoints' => $topRawTotalPoints,
                    'topSmackdownTotalPoints' => $topSmackdownTotalPoints
                    ]);
    }
    public function rankSuperstarPoints(){
        $user = DB::table('superstars')
        ->select('name','brand','points','champion','belt')
        ->max('points')
        ->get();
        return view('teste',['user' => $user]);
    }
    public function rankSuperstarRawPoints(){
        $user = DB::table('superstars')
        ->select('name','brand','points','champion','belt')
        ->where('brand', '=', "Raw")
        ->max('points')
        ->get();
        return view('teste',['user' => $user]);
    }
    public function rankSuperstarSdPoints(){
        $user = DB::table('superstars')
        ->select('name','brand','points','champion','belt')
        ->where('brand', '=', "Smackdown")
        ->max('points')
        ->get();
        return view('teste',['user' => $user]);
    }
    
}
