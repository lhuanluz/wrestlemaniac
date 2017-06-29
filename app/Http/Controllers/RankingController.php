<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\superstar;
use Illuminate\Support\Facades\DB;
use Auth;

class RankingController extends Controller
{
    //

    public function rankUserCashRaw(){

        $users = DB::table('raw_teams')  
                ->select('name','team_cash')              
                ->join('users', 'raw_teams.user_id', '=', 'users.id')
                ->orderBy('team_cash','desc')
                ->limit(10)
                ->get();
        $brand = "Raw";        
        return view('userRankingCash',['users' => $users, 'brand' => $brand]);
    }
    public function rankUserCashSd(){

        $users = DB::table('smackdown_teams')  
                ->select('name','team_cash')              
                ->join('users', 'smackdown_teams.user_id', '=', 'users.id')
                ->orderBy('team_cash','desc')
                ->limit(10)
                ->get();
        $brand = "SmackDown";        
        return view('userRankingCash',['users' => $users, 'brand' => $brand]);
    }
    public function rankUserCashPpv(){

        $users = DB::table('ppv_teams')  
                ->select('name','team_cash')              
                ->join('users', 'ppv_teams.user_id', '=', 'users.id')
                ->orderBy('team_cash','desc')
                ->limit(10)
                ->get();
        $brand = "Ppv";        
        return view('userRankingCash',['users' => $users, 'brand' => $brand]);
    }    
    public function rankUserRawPoints(){
            $users = DB::table('raw_teams')
                ->select('name', 'team_points')
                ->join('users', 'users.id', '=', 'raw_teams.user_id')
                ->orderBy('team_points', 'desc')
                ->limit(10)
                ->get();
                $brand = "Raw";
                return view('userRankingPoints',['users' => $users, 'brand' => $brand]);

    }
    public function rankUserSdPoints(){
            $users = DB::table('smackdown_teams')
                ->select('name', 'team_points')
                ->join('users', 'users.id', '=', 'smackdown_teams.user_id')
                ->orderBy('team_points', 'desc')
                ->limit(10)
                ->get();
                $brand = "Smackdown";
                return view('userRankingPoints',['users' => $users, 'brand' => $brand]);

    }
    public function rankUserPpvPoints(){
            $users = DB::table('ppv_teams')
                ->select('name', 'team_points')
                ->join('users', 'users.id', '=', 'ppv_teams.user_id')
                ->orderBy('team_points', 'desc')
                ->limit(10)
                ->get();
                $brand = "Ppv";
                return view('userRankingPoints',['users' => $users, 'brand' => $brand]);

    }
    public function rankUserRawPointsTotal(){
            $users = DB::table('raw_teams')
                ->select('name', 'team_total_points')
                ->join('users', 'users.id', '=', 'raw_teams.user_id')
                ->orderBy('team_total_points', 'desc')
                ->limit(10)
                ->get();
                $brand = "Raw";
                return view('userRankingPointsTotal',['users' => $users, 'brand' => $brand]);

    }
    public function rankUserSdPointsTotal(){
            $users = DB::table('smackdown_teams')
                ->select('name', 'team_total_points')
                ->join('users', 'users.id', '=', 'smackdown_teams.user_id')
                ->orderBy('team_total_points', 'desc')
                ->limit(10)
                ->get();
                $brand = "Smackdown";
                return view('userRankingPointsTotal',['users' => $users, 'brand' => $brand]);

    }
    public function rankUserPpvPointsTotal(){
            $users = DB::table('ppv_teams')
                ->select('name', 'team_total_points')
                ->join('users', 'users.id', '=', 'ppv_teams.user_id')
                ->orderBy('team_total_points', 'desc')
                ->limit(10)
                ->get();
                $brand = "Ppv";
                return view('userRankingPointsTotal',['users' => $users, 'brand' => $brand]);

    }
    
}
