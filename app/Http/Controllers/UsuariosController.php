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
        $imagens = DB::table('images')->get();
        return view('selectPhoto',[
            'imagens' => $imagens, // Lista de Imagens
            ]);
    }

    public function addPhoto(Request $request){
        $this->validate($request,[
            'photo' => 'required',
            'name' => 'required'
        ]);
        $nomeDaImagem = $request->photo->getClientOriginalName();
        $caminho = 'storage/users/'.$nomeDaImagem;
        $imagem = $request->photo;
        $imagem->storeAs('users',$nomeDaImagem,'public');

        DB::table('images')
            ->insert([
                'name' => $request->name,
                'img_url' => $caminho
        ]);

        return redirect()->route('addPhotoRedirect');
    }

    public function addPhotoRedirect(){
        return view('addPhotos');
    }

}
