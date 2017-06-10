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

    public function editar(Request $request){
        $this->validate($request,[
            'name'  => 'required',
             'points' => 'required',
             'price' => 'required'
        ]);
        
        
        $ult_pontos = DB::table('superstars')
                        ->where('name',$request->get('name'))
                        ->value('points');

        DB::table('superstars')
            ->where('name', $request->get('name'))
            ->update([
                'last_points' => $ult_pontos,
                'points' => $request->get('points'),
                'price' => $request->get('price'),
                'last_show' => 1
                ]);

        return view('admin');
    }

   /* public function listar(){
        $superstars = DB::table('superstars')->get();
        echo '<select name="brand">';
        foreach ($superstars as $superstar) {
          echo '<option value="{{$superstar->name}}">' . $superstar->name . '</option>';
        }
        echo '</select>';
        echo '<a href="/admin"><button class="btn btn-lg btn-primary">Editar</button>';

    }*/
}
