<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\superstar;
use App\Models\Icon;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /*
                                                                                   
I8,        8        ,8I                                            88                                                           88                          
`8b       d8b       d8'                                     ,d     88                                                           ""                          
 "8,     ,8"8,     ,8"                                      88     88                                                                                       
  Y8     8P Y8     8P  8b,dPPYba,   ,adPPYba,  ,adPPYba,  MM88MMM  88   ,adPPYba,  88,dPYba,,adPYba,   ,adPPYYba,  8b,dPPYba,   88  ,adPPYYba,   ,adPPYba,  
  `8b   d8' `8b   d8'  88P'   "Y8  a8P_____88  I8[    ""    88     88  a8P_____88  88P'   "88"    "8a  ""     `Y8  88P'   `"8a  88  ""     `Y8  a8"     ""  
   `8a a8'   `8a a8'   88          8PP"""""""   `"Y8ba,     88     88  8PP"""""""  88      88      88  ,adPPPPP88  88       88  88  ,adPPPPP88  8b          
    `8a8'     `8a8'    88          "8b,   ,aa  aa    ]8I    88,    88  "8b,   ,aa  88      88      88  88,    ,88  88       88  88  88,    ,88  "8a,   ,aa  
     `8'       `8'     88           `"Ybbd8"'  `"YbbdP"'    "Y888  88   `"Ybbd8"'  88      88      88  `"8bbdP"Y8  88       88  88  `"8bbdP"Y8   `"Ybbd8"'  
                                                                             
    Created by: Luan Luz
    */

        public function adminPanel(){
            $usuariosCadastrados = DB::table('users')->count();
            $admins = DB::table('users')->where('user_power','>=',1)->orderBy('user_power','desc')->get();
            $usuariosCadastradosHoje = DB::table('users')->whereDate('created_at', DB::raw('CURDATE()'))->count('created_at');
            $timesDoRaw = DB::table('raw_teams')
                            ->where('superstar01','!=',103)
                            ->orwhere('superstar02','!=',102)
                            ->orwhere('superstar03','!=',101)
                            ->orwhere('superstar04','!=',100)
                            ->count();

            $timesDoSmack = DB::table('smackdown_teams')
                            ->where('superstar01','!=',103)
                            ->orwhere('superstar02','!=',102)
                            ->orwhere('superstar03','!=',101)
                            ->orwhere('superstar04','!=',100)
                            ->count();

            $timesDoPPV = DB::table('ppv_teams')
                            ->where('superstar01','!=',103)
                            ->orwhere('superstar02','!=',102)
                            ->orwhere('superstar03','!=',101)
                            ->orwhere('superstar04','!=',100)
                            ->count();

            $top10Raw = DB::select('select id, name,image, sum(total) as total from (
                select s.id, s.name,s.image, count(st.superstar01) as total from superstars as s, raw_teams as st where st.superstar01 = s.id group by s.id,s.name,s.image
                union
                select s.id, s.name,s.image, count(st.superstar02) as total from superstars as s, raw_teams as st where st.superstar02 = s.id group by s.id,s.name,s.image
                union
                select s.id, s.name,s.image, count(st.superstar03) as total from superstars as s, raw_teams as st where st.superstar03 = s.id group by s.id,s.name,s.image
                union
                select s.id, s.name,s.image, count(st.superstar04) as total from superstars as s, raw_teams as st where st.superstar04 = s.id group by s.id,s.name,s.image
                ) as juncao where id not in (103,102,101,100) group by id,juncao.name,juncao.image order by total desc limit 10');

            $top10Smack = DB::select('select id, name,image, sum(total) as total from (
                select s.id, s.name,s.image, count(st.superstar01) as total from superstars as s, smackdown_teams as st where st.superstar01 = s.id group by s.id,s.name,s.image
                union
                select s.id, s.name,s.image, count(st.superstar02) as total from superstars as s, smackdown_teams as st where st.superstar02 = s.id group by s.id,s.name,s.image
                union
                select s.id, s.name,s.image, count(st.superstar03) as total from superstars as s, smackdown_teams as st where st.superstar03 = s.id group by s.id,s.name,s.image
                union
                select s.id, s.name,s.image, count(st.superstar04) as total from superstars as s, smackdown_teams as st where st.superstar04 = s.id group by s.id,s.name,s.image
                ) as juncao where id not in (103,102,101,100) group by id,juncao.name,juncao.image order by total desc limit 10');

            $top10Ppv = DB::select('select id, name,image, sum(total) as total from (
                select s.id, s.name,s.image, count(st.superstar01) as total from superstars as s, ppv_teams as st where st.superstar01 = s.id group by s.id,s.name,s.image
                union
                select s.id, s.name,s.image, count(st.superstar02) as total from superstars as s, ppv_teams as st where st.superstar02 = s.id group by s.id,s.name,s.image
                union
                select s.id, s.name,s.image, count(st.superstar03) as total from superstars as s, ppv_teams as st where st.superstar03 = s.id group by s.id,s.name,s.image
                union
                select s.id, s.name,s.image, count(st.superstar04) as total from superstars as s, ppv_teams as st where st.superstar04 = s.id group by s.id,s.name,s.image
                ) as juncao where id not in (103,102,101,100) group by id,juncao.name,juncao.image order by total desc limit 10');

            $mercados = DB::table('configs')->first();
            $rawChampion = DB::table('user_belts')->join('users', 'user_belts.user_id', '=', 'users.id')->where('user_belts.id',1)->first();
            $smackdownChampion = DB::table('user_belts')->join('users', 'user_belts.user_id', '=', 'users.id')->where('user_belts.id',2)->first();
            $champions = DB::table('superstars')->where('champion','>=',1)->orderBy('brand')->get();

            return view('admin/painelAdmin',[
                'usuariosCadastrados' => $usuariosCadastrados,
                'usuariosCadastradosHoje' => $usuariosCadastradosHoje,
                'admins' => $admins,
                'timesDoRaw' => $timesDoRaw,
                'timesDoSmack' => $timesDoSmack,
                'timesDoPPV' => $timesDoPPV,
                'mercados' => $mercados,
                'top10Raw' => $top10Raw,
                'top10Smack' => $top10Smack,
                'top10Ppv' => $top10Ppv,
                'rawChampion' => $rawChampion,
                'smackdownChampion' => $smackdownChampion,
                'champions' => $champions
            ]);
        } 
   
}
