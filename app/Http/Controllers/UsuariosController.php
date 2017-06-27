<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    //

    public function editarEmail(){

        return view('editEmail');
    }
    public function editarEmailRequest(Request $request){
        $this->validate($request,[
            'id' => 'required',
            'email' => 'required'
        ]);
         DB::table('users')
            ->where('id', $request->id)
            ->update([
                'email' => $request->email
                ]);
        return redirect()->route('painelAdmin');
    }
}
