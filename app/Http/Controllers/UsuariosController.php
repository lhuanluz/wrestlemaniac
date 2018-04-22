<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\Mail\NewUserVerify;
use App\Mail\alterEmail;

class UsuariosController extends Controller
{    
    
    public function darProRedirect(){
        // Retorna o usuário para a página de dar PRO
        return view('admin/darPro');
    }
        
    public function criarAdminRedirect(){
        // Retorna o usuário para a página de criar admin
        return view('admin/criarAdmin');
    }

    public function editarUsuarioEmailRedirect(){
        // Retorna o usuário para a página de editar email do usuário
        return view('admin/editarUsuarioEmail');
    }
    public function editarUsuarioNomeRedirect(){
        // Retorna o usuário para a página de editar o nome do usuário
        return view('admin/editarUsuarioNome');
    }
    public function checarUsuarioRedirect(){
        return view('admin/checarUsuario');
    }

    public function comprarIcone(Request $request){
        $icon = DB::table('icons')->where('id',$request->iconID)->first();
        $user = Auth::user();
        $iconsComprados = DB::select( 
            DB::raw("SELECT * FROM icons WHERE icons.id IN (
                SELECT user_icons.icon_id FROM user_icons WHERE user_icons.user_id = $user->id ORDER BY date) 
            "));
        foreach ($iconsComprados as $iconComprado) {
            if ($iconComprado->id == $icon->id) {
                return redirect()->route('iconStore');
                die();
            }
        }
        if($user->wc >= $icon->price){
            $wcRestante = $user->wc - $icon->price;
            DB::table('user_icons')->insert([
                ['user_id' => $user->id, 'icon_id' => $icon->id]
            ]);
            DB::table('users')->where('id',Auth::user()->id)->update([
                'wc' => $wcRestante
            ]);
        }
        return redirect()->route('selectPhotoRedirect');
    }

    public function iconStore(){
        $user = Auth::user();
        $iconsNaoComprados = DB::select( 
            DB::raw("SELECT * FROM icons WHERE icons.id NOT IN (
                SELECT user_icons.icon_id FROM user_icons WHERE user_icons.user_id = $user->id)
            AND icons.tier < 5 ORDER BY name"));
        return view('shop',[
            'iconsNaoComprados' => $iconsNaoComprados
        ]);
        
    }
    public function escolhaDeIconRedirect(){
        $user = Auth::user();
        $iconsComprados = DB::select( 
            DB::raw("SELECT * FROM icons WHERE icons.id IN (
                SELECT user_icons.icon_id FROM user_icons WHERE user_icons.user_id = $user->id ORDER BY date) 
            "));
        return view('selectPhoto',[
            'iconsComprados' => $iconsComprados
        ]);
    }

    public function selecionarIcon(Request $request){
        DB::table('users')->where('id',Auth::user()->id)->update([
            'photo' => $request->photo
        ]);

        return redirect()->route('home');
    }

    public function addPhoto(Request $request){
        $this->validate($request,[
            'photo' => 'required',
            'name' => 'required',
            'tipo' => 'required'
        ]);
        $nomeDaImagem = $request->photo->getClientOriginalName();
        $caminho = 'storage/users/'.$nomeDaImagem;
        $imagem = $request->photo;
        $imagem->storeAs('users',$nomeDaImagem,'public');

        DB::table('images')
            ->insert([
                'name' => $request->name,
                'img_url' => $caminho,
                'type' => $request->tipo
        ]);

        return redirect()->route('addPhotoRedirect');
    }

    public function addPhotoRedirect(){
        return view('addPhotos');
    }

    public function alterName(){
        return view('teste');
    }
    public function alterNameRequest(Request $request){
        $email = Auth::user()->email;
        $this->validate($request,[
            'newName' => 'required'
        ]);
        DB::table('users')
        ->where('email',$email)
        ->update([
            'name' => $request->newName
        ]);
        return redirect()->route('home');
    }
    public function alterPass(){
        return view('teste');
    }
    public function alterPassRequest(Request $request){
        $email = Auth::user()->email;
        $pass = Auth::user()->password;
        $this->validate($request,[
            'oldPass' => 'required|string|min:6' ,
            'newPass' => 'required|string|min:6'
        ]);
        if (Hash::check($request->oldPass, $pass))
        {
            DB::table('users')
            ->where('email',$email)
            ->update([
                'password' => Hash::make($request->newPass),
                'updated_at' => DB::raw('CURDATE()')
            ]);
            return redirect()->route('home')->withMessage("Password Changed");
        }else{
            return redirect()->route('home')->withMessage("Password Change Failed");
        }
    }
    //Funcao para verificar email de usuarios novos
    public function emailVerify($code){
       $user = DB::table('users')
       ->where('verifyCode',$code)
       ->first();
        DB::table('users')
        ->where('email', $user->email)
        ->update([
            'verified' => 1,
            'verifyCode' => null
        ]);
        return redirect()->route('home');
    }
    //Funcao para verifica email de usuarios antigos logados
    public function emailReVerify(){
        $code = base64_encode(str_random(40));
        DB::table('users')
        ->where('email', Auth::user()->email)
        ->update([
            'verifyCode' => $code
        ]);
        Mail::to(Auth::user()->email)->queue(new NewUserVerify(Auth::user()));
        return redirect()->route('home');
    }
    
    public function changeEmail(){//Função so para testar o botao de enviar email 
        return view('changeEmail');
    }
    public function sendChangeEmail(){  //Função para mandar o e-mail de troca de e-mail
        $code = rand(1000,9999); //Gerar o codigo para verificação
        DB::table('users') // Consulta sql para atualizar a coluna do codigo referente ao usuario logado
        ->where('email', Auth::user()->email)
        ->update([
            'verifyCode' => $code
            ]);
            Mail::to(Auth::user()->email)//Função para mandar o email para fila, utilizando o usuario logado                     
            ->queue(new alterEmail(Auth::user()));   
            return redirect()->route('vEmailR');         
    }
    public function verifyChangeEmailRedirect(){//Função so para testar o botao de enviar email 
        return view('changeEmailConfirmed');
    }
    public function verifyChangeEmail(Request $request){
        $this->validate($request,[
            'code' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6'
        ]);                
        if (Hash::check($request->password, Auth::user()->password))
        {
         DB::table('users')
         ->where('email', Auth::user()->email)
         ->update([
             'email' => $request->email,
             'verified' => 1,
             'verifyCode' => null
         ]);
        }
         return redirect()->route('home');
    }
    
    public function darPro(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'tipo' => 'required'
        ]);
        DB::table('users')
            ->where('email',$request->email)
            ->update([
                'type' => $request->tipo
            ]);

        return redirect()->route('giveProRedirect');
    }

    public function criarAdmin(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'nivel' => 'required',
            'role' => 'required'
        ]);
        DB::table('users')
            ->where('email', $request->email)
            ->update([
                'user_power' => $request->nivel,
                'role' => $request->role
                ]);
        return redirect()->route('createAdminRedirect');
    }

    public function editarUsuarioEmail(Request $request){
        $this->validate($request,[
            'emailAntigo' => 'required',
            'email' => 'required'
        ]);
         DB::table('users')
            ->where('email', $request->emailAntigo)
            ->update([
                'email' => $request->email
                ]);
        return redirect()->route('editUserEmailRedirect');
    }
    public function editarUsuarioNome(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'nome' => 'required'
        ]);
         DB::table('users')
            ->where('email', $request->email)
            ->update([
                'name' => $request->nome
                ]);
        return redirect()->route('editUserNameRedirect');
    }
    public function checarUsuario(Request $request){

        $user = DB::table('users')->where('email',$request->email)->first();
        $rawTeam = DB::table('raw_teams')->where('user_id',$user->id)->first();
        $smackdownTeam = DB::table('smackdown_teams')->where('user_id',$user->id)->first();
        $ppvTeam = DB::table('ppv_teams')->where('user_id',$user->id)->first();

        $superstarsRaw = DB::table('superstars')
                        ->whereIn('id',[$rawTeam->superstar01,$rawTeam->superstar02,$rawTeam->superstar03,$rawTeam->superstar04])
                        ->get();
        $superstarsSmackdown = DB::table('superstars')
                        ->whereIn('id',[$smackdownTeam->superstar01,$smackdownTeam->superstar02,$smackdownTeam->superstar03,$smackdownTeam->superstar04])
                        ->get();
        $superstarsPpv = DB::table('superstars')
                        ->whereIn('id',[$ppvTeam->superstar01,$ppvTeam->superstar02,$ppvTeam->superstar03,$ppvTeam->superstar04])
                        ->get();
        $leagueInfo = DB::table('leagues')->where('id',$user->id_league)->first();
        $leagueMembers = DB::table('users')->where('id_league',$user->id_league)->first();
        $positionRaw = DB::table('raw_teams')->orderBy('team_total_points', 'desc')->pluck('id')->toArray();
        $positionSmackdown = DB::table('smackdown_teams')->orderBy('team_total_points', 'desc')->pluck('id')->toArray();
        $iconsComprados = DB::select( 
            DB::raw("SELECT * FROM icons WHERE icons.id IN (
                SELECT user_icons.icon_id FROM user_icons WHERE user_icons.user_id = $user->id ORDER BY date) 
            "));
        return view('admin/infoUsuario',[
            'user' => $user,
            'rawTeam' => $rawTeam,
            'smackdownTeam' => $smackdownTeam,
            'ppvTeam' => $ppvTeam,
            'superstarsRaw' => $superstarsRaw,
            'superstarsSmackdown' => $superstarsSmackdown,
            'superstarsPpv' => $superstarsPpv,
            'leagueInfo' => $leagueInfo,
            'leagueMembers' => $leagueMembers,
            'positionRaw' => $positionRaw,
            'positionSmackdown' => $positionSmackdown,
            'iconsComprados' => $iconsComprados
            ]);
    }
    public function checarUsuarioConfirmar(Request $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);

        $usuarios = DB::table('users')->join('leagues', 'users.id_league', '=', 'leagues.id')->where('name','like','%'.$request->name.'%')->get();

        return view('admin/confirmarUsuarioCheck',[
            'usuarios' => $usuarios
        ]);
    }

}