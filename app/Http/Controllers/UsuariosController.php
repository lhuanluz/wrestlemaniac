<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     public function editarFoto(){

        return view('editarFotoUser');
    }
    public function editarFotoRequest(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'photo' => 'required'
        ]);
         DB::table('users')
            ->where('email', $request->email)
            ->update([
                'photo' => $request->photo
                ]);
        return redirect()->route('painelAdmin');
    }
}
