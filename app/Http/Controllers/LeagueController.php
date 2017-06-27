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
            $membros = DB::table('users')->where('id_league',$idLeague)->take($quantidade)->get();
            // MEMBROS DA LIGA
            $owner = DB::table('users')->where('id',$league->owner)->first();
            $member1 = DB::table('users')->where('id',$league->member1)->first();
            $member2 = DB::table('users')->where('id',$league->member2)->first();
            $member3 = DB::table('users')->where('id',$league->member3)->first();
            $member4 = DB::table('users')->where('id',$league->member4)->first();


            
            
            /*$luan =  $quantidade->where('id', '6')->first();
            print_r ($luan);*/
        }else{
            $userHasLeague = false;
        }
        return view('leagueHome',['userHasLeague' => $userHasLeague,'membros' => $membros]);
    }
}
