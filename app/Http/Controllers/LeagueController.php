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
    //Função que é executada toda vez que a página da liga é aberta
    public function liga(){
        $userId = Auth::user()->id; //Pega o id do usuário
        $user = DB::table('users')->where('id',$userId)->first(); // Pega o usuário com o id
        $userHasLeague; // Declara a variável que receberá a informação se o usuário tem liga ou não
        $idLeague = $user->id_league; // Pega a id da liga que o usuário está
        if($idLeague > 1){
            // Caso o usuário tenha liga
            $liga = DB::table('leagues')->where('id',$idLeague)->first(); // Pega a linha da liga do usuário
            $userHasLeague = true; // Define que o usuário tem liga
            $quantidade = DB::table('users')->where('id_league',$idLeague)->count(); // Pega quantos usuários da liga existem
            // Começa a pegar todos os times do raw de cada membro da liga
            $membrosRaw = DB::table('users')
                     ->join('raw_teams', 'users.id', '=', 'raw_teams.user_id')
                     ->where('id_league',$idLeague)->take($quantidade)
                     ->orderBy('team_total_points','desc')
                     ->get();
            // Começa a pegar todos os times do smackdown de cada membro da liga
            $membrosSmackdown = DB::table('users')
                     ->join('smackdown_teams', 'users.id', '=', 'smackdown_teams.user_id')
                     ->where('id_league',$idLeague)->take($quantidade)
                     ->orderBy('team_total_points','desc')
                     ->get();
            // Pega todos os membros da liga ordenados pelo nome para as fotos
            $membros = DB::table('users')
                     ->where('id_league',$idLeague)->take($quantidade)
                     ->orderBy('name','asc')
                     ->get();

            $addR = 0; // Pontos totais do Raw na liga
            $addS = 0; // Pontos totais do Smackdown na liga
            
            // For para adicionar os pontos dos times do raw e smackdown de cada membro aos pontos totais da liga raw/smackdown
            for ($i=0; $i < $quantidade ; $i++) { 
                $addR += $membrosRaw[$i]->team_total_points;
                $addS +=  $membrosSmackdown[$i]->team_total_points;
            }

            $addR = $addR / $quantidade; // Adiciona a média do Raw dividio pela quantidade de jogadores
            $addS = $addS / $quantidade; // Adiciona a média do Smackdown dividio pela quantidade de jogadores
            $add = $addR + $addS; // Soma as médias para achar a pontuação da liga

            // Faz o update na tabela
            DB::table('leagues')->where('id',$idLeague)->update([
                'league_points' => $add
            ]);

            $positionLeague = DB::table('leagues')->orderBy('league_points', 'desc')->pluck('id')->toArray(); // Pega a posição/rank da liga por pontos
            
            // Retorna todas as variáveis necessárias para a página de liga 
            return view('leagueHome',[
            'userHasLeague' => $userHasLeague, // Confirmação da liga do usuário
            'liga' => $liga, // Passa toda Liga do usuário
            'positionLeague' => $positionLeague, // Passa o rank da liga do usuário
            'membrosRaw' => $membrosRaw, // Passa as informações dos times do raw de todos os membros da liga
            'membrosSmackdown' => $membrosSmackdown, // Passa as informações dos times do smackdown de todos os membros da liga
            'membros' => $membros, // Passa as informações de todos os membros da liga de uma vez (Para organização dos avatares)
            'quantidade' => $quantidade // Passa a quantidade de jogadores na liga para poderem ser exibidos
            ]);

        }else{
            // Caso o usuário não tenha liga
            $userHasLeague = false; // Confirma que o usuário não tem liga
            // Retorna a condição do usuário
            return view('leagueHome',[
            'userHasLeague' => $userHasLeague]);
        }
    }
    
    public function criarLiga(Request $request){
        // Autenticação
        $this->validate($request,[
            'name'      => 'required|max:25',
            'secret_password' => 'required|confirmed',
            'secret_password_confirmation' => 'required'
        ]);
        if(Auth::user()->id_league == 1){ 
            $userId = Auth::user()->id; // Pega id do usuário

            // Cria Liga com as informações que o usuário digitou no formulário
            $league = league::create([
                'league_name' => $request->name,
                'secret_password' => Hash::make($request->secret_password),
                'owner' => $userId
            ]);

            // Seta a qual o id da liga dele na tabela de usuários
            DB::table('users')
                ->where('id',$userId)
                ->update([
                    'id_league' => $league->id
                ]);

            return redirect()->route('leagueHome'); // Retorna o usuário para a página de liga
            }else{
            return redirect()->route('leagueHome');
        }
    }

    public function entrarLiga(Request $request){
        // Autenticação
        $this->validate($request,[
            'leagueName'      => 'required'
        ]);
        $user = Auth::user();
        if($user->id_league == 1){  
            // Pega a liga que o usuário digitou
            $league = DB::table('leagues')
                ->where('league_name',$request->leagueName)
                ->first();
            $userId = Auth::user()->id; // Pega o id do usuário
            DB::table('league_notifications')->insert([
                ['id_league' => $league->id, 'id_user' => $user->id]
            ]);
            return redirect()->route('leagueHome');
        }else{
            return redirect()->route('leagueHome');
        }
    }
    /*
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
    */

    public function mudarSecretPassword(Request $request){
        // Autenticação
        $this->validate($request,[
            'secret_password_old' => 'required',
            'secret_password' => 'required'
        ]);

        $userId = Auth::user()->id; // Pega o id do usuário

        //Pega as informações do usuário
        $user = DB::table('users')
            ->where('id', $userId)
            ->first();

        // Pega as informações da liga do usuário
        $league = DB::table('leagues')
            ->where('id', $user->id_league)
            ->first();
        
        // Confere se o usuário é dono da liga
        if($league->owner == $userId){
            // Verifica se a senha digita confere com a atual
            if (Hash::check($request->secret_password_old, $league->secret_password)) {
                // Modifica a senha anterior para a nova
                DB::table('leagues')
                ->where('id',$league->id)
                ->update(['secret_password' => bcrypt($request->secret_passowrd)]);   
                
                return redirect()->route('leagueHome');
            }
            // Caso a senha digita não seja correta
            return redirect()->route('leagueHome');
        }
        // Caso o usuário não seja dono da liga
        return redirect()->route('leagueHome');
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
                        ->update(['member2' => 3]);

                }else if ($league->member3 == $userRemover->id) {

                    DB::table('users')
                        ->where('id',$userRemover->id)
                        ->update(['id_league' => 1]);
                    DB::table('leagues')
                        ->where('id',$league->id)
                        ->update(['member3' => 4]);

                }else if ($league->member4 == $userRemover->id) {

                    DB::table('users')
                        ->where('id',$userRemover->id)
                        ->update(['id_league' => 1]);
                    DB::table('leagues')
                        ->where('id',$league->id)
                        ->update(['member4' => 5]);

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
        DB::table('users')
        ->where('id',$userId)
        ->update(['id_league' => 1]);

        return redirect()->route('leagueHome');
    }
    public function deletarLiga(){
        $userId = Auth::user()->id;
        $user = DB::table('users')
            ->where('id', $userId)
            ->first();
        $league = DB::table('leagues')
            ->where('id', $user->id_league)
            ->first();
        if($league->owner == $userId){
                DB::table('users')
                ->where('id_league',$league->id)
                ->update(['id_league' => 1]);

                DB::table('leagues')
                ->where('id',$league->id)
                ->update([
                    'owner' => 1,
                    'league_points' => 0
                    ]);
        }
        return redirect()->route('leagueHome');
    }

}
