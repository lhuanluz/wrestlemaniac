<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class UsuariosController extends Controller
{
    //

    public function editarEmail(){

        return view('editEmail');
    }
    public function editarEmailRequest(Request $request){
        $this->validate($request,[
            'emailAntigo' => 'required',
            'email' => 'required'
        ]);
         DB::table('users')
            ->where('email', $request->emailAntigo)
            ->update([
                'email' => $request->email
                ]);
        return redirect()->route('painelAdmin');
    }

    public function editarNome(){

        return view('editNome');
    }
    public function editarNomeRequest(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'nome' => 'required'
        ]);
         DB::table('users')
            ->where('email', $request->email)
            ->update([
                'name' => $request->nome
                ]);
        return redirect()->route('painelAdmin');
    }

    public function editarAdmin(){

        return view('editAdmin');
    }
    public function editarAdminRequest(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'nivel' => 'required'
        ]);
         DB::table('users')
            ->where('email', $request->email)
            ->update([
                'user_power' => $request->nivel
                ]);
        return redirect()->route('painelAdmin');
    }
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

    public function givePro(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'tipo' => 'required'
        ]);
        DB::table('users')
            ->where('email',$request->email)
            ->update([
                'type' => $request->tipo
            ]);

        return redirect()->route('painelAdmin');
    }

    public function giveProRedirect(){
        return view('givePro');
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
}
