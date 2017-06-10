<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller {
    //

    public function index() {
        return view('login');
    }

    public function logar(Request $request) {
        $this->validate($request,[
            'login'  => 'required',
             'senha' => 'required|in:123456|same:confirmar_senha'
        ]);
        
        //$request->session()->put('usuario', $request->login);
        echo $request->session()->get('usuario');
        return redirect()->route('dashboard');
        //echo $request->login;
    }
}
