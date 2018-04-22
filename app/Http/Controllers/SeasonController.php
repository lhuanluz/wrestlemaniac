<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\superstar;
use App\Models\Icon;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class SeasonController extends Controller
{
    public function resetarSeasonRedirect(){
        return view('admin/seasonReset');
    }

    public function resetarSeason(){
        DB::table('superstars')->where('name','!=','None')
        ->update([
            'price' => 1000,
            'points' => 0.0,
            'last_points' => 0.0
        ]);
        DB::table('raw_teams')
        ->update([
            'superstar01' => 103,
            'superstar02' => 102,
            'superstar03' => 101,
            'superstar04' => 100,
            'team_points' => 0.0,
            'team_total_points' => 0.0,
            'team_cash' => 4000
        ]);
        DB::table('smackdown_teams')
        ->update([
            'superstar01' => 103,
            'superstar02' => 102,
            'superstar03' => 101,
            'superstar04' => 100,
            'team_points' => 0.0,
            'team_total_points' => 0.0,
            'team_cash' => 4000
        ]);
        DB::table('leagues')
        ->update([
            'league_points' => 0.0
        ]);
        return redirect()->route('painelAdmin');
    }
}
