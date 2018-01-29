<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\superstar;
use Illuminate\Support\Facades\DB;

class InicioController extends Controller
{
   public function homeRedirect(){
       if(Auth::guest()){
            $bannerR = "img/superstars".rand(1, 3).".png";
            
            return view('home',[
                'bannerR' => $bannerR
                ]);        
       }else{
        $superstars = DB::table('superstars')
                 ->orderBy('name', 'asc')->get();
        $userId = Auth::user()->id;
        $rawTeam = DB::table('raw_teams')
                    ->where('user_id',$userId)
                    ->first();
        $smackdownTeam = DB::table('smackdown_teams')
                    ->where('user_id',$userId)
                    ->first();
        $status = DB::table('configs')->first();
        
        $ppvTeam = DB::table('ppv_teams')
                    ->where('user_id',$userId)
                    ->first();

        $ppv_teamS1 =  DB::table('superstars')
                        ->where('id',$ppvTeam->superstar01)
                        ->first();
        $ppv_teamS2 =  DB::table('superstars')
                        ->where('id',$ppvTeam->superstar02)
                        ->first();
        $ppv_teamS3 =  DB::table('superstars')
                        ->where('id',$ppvTeam->superstar03)
                        ->first();
        $ppv_teamS4 =  DB::table('superstars')
                        ->where('id',$ppvTeam->superstar04)
                        ->first();
        
        $positionRaw = DB::table('raw_teams')->orderBy('team_total_points', 'desc')->pluck('id')->toArray();
        $positionSmackdown = DB::table('smackdown_teams')->orderBy('team_total_points', 'desc')->pluck('id')->toArray();
        $totalTeam = $smackdownTeam->team_total_points + $rawTeam->team_total_points;
        $liga = DB::table('leagues')->where('id',Auth::user()->id_league)->first();

        return view('home',[
            'superstars' => $superstars,
            'rawTeam' => $rawTeam,
            'status' => $status,
            'smackdownTeam' => $smackdownTeam,
            'ppvTeam' => $ppvTeam,
            'totalTeam' => $totalTeam,
            'positionRaw' => $positionRaw,
            'positionSmackdown' => $positionSmackdown,
            'liga' => $liga,
            'ppv_teamS1' => $ppv_teamS1,
            'ppv_teamS2' => $ppv_teamS2,
            'ppv_teamS3' => $ppv_teamS3,
            'ppv_teamS4' => $ppv_teamS4
            
            ]);
       }
   }
}
