<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\superstar;
use App\Models\Icon;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class BeltController extends Controller
{
    public function configurarBelts(){
        $top1Raw = DB::table('raw_teams')
        ->orderBy('team_total_points','desc')->first();

        $top1Smack = DB::table('smackdown_teams')
        ->orderBy('team_total_points','desc')->first();

        $top1League = DB::table('leagues')
        ->orderBy('league_points','desc')->first();

        DB::table('user_belts')->where('id',1)->update([
            'user_id' => $top1Raw->user_id,
            'days' => 1
        ]);
        DB::table('user_belts')->where('id',2)->update([
            'user_id' => $top1Smack->user_id,
            'days' => 1
        ]);
        DB::table('league_belts')->where('id',1)->update([
            'id_league' => $top1League->id,
            'days' => 1
        ]);
        return redirect()->route('painelAdmin');  
    }
    public function verificarBelts(){
        $atualChampRaw = DB::table('user_belts')->where('id',1)->first();
        $atualChampSmack = DB::table('user_belts')->where('id',2)->first();
        $atualChampLeague = DB::table('league_belts')->first();

        $top1Raw = DB::table('raw_teams')
        ->orderBy('team_total_points','desc')->first();

        $top1Smack = DB::table('smackdown_teams')
        ->orderBy('team_total_points','desc')->first();

        $top1League = DB::table('leagues')
        ->orderBy('league_points','desc')->first();

        if ($atualChampRaw->user_id != $top1Raw->user_id) {
            DB::table('user_belts_history')->insert([
                'id_user' => $atualChampRaw->user_id,
                'id_belt' => 1,
                'days' => $atualChampRaw->days
            ]);
            DB::table('user_belts')->where('id',1)->update([
                'user_id' => $top1Raw->user_id,
                'days' => 1
            ]);
        }else{
            DB::table('user_belts')->where('id',1)->increment('days');
        }

        if ($atualChampSmack->user_id != $top1Smack->user_id) {
            DB::table('user_belts_history')->insert([
                'id_user' => $atualChampSmack->user_id,
                'id_belt' => 2,
                'days' => $atualChampSmack->days
            ]);
            DB::table('user_belts')->where('id',2)->update([
                'user_id' => $top1Smack->user_id,
                'days' => 1
            ]);
        }else{
            DB::table('user_belts')->where('id',2)->increment('days');
        }

        if ($atualChampLeague->id_league != $top1League->id) {
            DB::table('league_belts_history')->insert([
                'id_league' => $atualChampLeague->id_league,
                'id_belt' => 1,
                'days' => $atualChampLeague->days
            ]);
            DB::table('league_belts')->where('id',1)->update([
                'id_league' => $top1League->id,
                'days' => 1
            ]);
        }else{
            DB::table('league_belts')->where('id',1)->increment('days');
        }
        return redirect()->route('painelAdmin');  
    }
}
