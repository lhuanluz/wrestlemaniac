<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\superstar;
use Illuminate\Support\Facades\DB;

class SuperstarsController extends Controller
{
    public function cadastrar(Request $request){
         $this->validate($request,[
            'name'  => 'required',
             'brand' => 'required'
        ]);

         superstar::create(['name' => $request->get('name'), 
                        'brand' => $request->get('brand'),
                        'points' => 0.0,
                        'last_points' => 0.0,
                        'price' => 1000.00,
                        'last_show' => 0
                        ]);
        return view('admin');
        
       /* $teste = DB::table('superstars')
                    ->update(['points' => 9.5]);
        echo $teste;*/
        

    }
}
