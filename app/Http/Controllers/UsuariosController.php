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
    
    
    
    public function selectPhoto(Request $request){
        $this->validate($request,[
            'photo' => 'required'
        ]);
        $userId = Auth::user()->id;
         DB::table('users')
            ->where('id', $userId)
            ->update([
                'photo' => $request->photo
                ]);
        return redirect()->route('home');
    }

    public function selectPhotoRedirect(){
        $user = Auth::user();
        if($user->type == 'Pro'){
            $imagens = DB::table('images')->orderBy('name')->get();
        }else{
            $imagens = DB::table('images')->where('type','Free')->orderBy('name')->get();
        }
        return view('selectPhoto',[
            'imagens' => $imagens, // Lista de Imagens
            ]);
        
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
    /*public function comprarIconeRedirect(){
        $icones = DB::table('icons') 
        return view('comprarIcone');
    }
    public function comprarIcone(Request $request){

    }*/
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
    public function changeEmail(){
        return view('teste');
    }
    public function sendChangeEmail(Request $request){
        $this->validate($request,[            
            'newEmail' => 'required|string|email|max:255'
        ]);
        $newEmail = $request->newEmail;
        $code = base64_encode(str_random(40)); 
        DB::table('users')
        ->where('email', Auth::user()->email)
        ->update([
            'verifyCode' => $code
            ]);
            Mail::to(Auth::user()->email)                     
            ->queue(new alterEmail(Auth::user(), $newEmail));
            return redirect()->route('home');
    }
    public function verifyChangeEmail($code,$newEmail){
        $user = DB::table('users')
        ->where('verifyCode',$code)
        ->first();
         DB::table('users')
         ->where('email', $user->email)
         ->update([
             'email' => $newEmail,
             'verified' => 1,
             'verifyCode' => null
         ]);
         return redirect()->route('home');
    }
    
}