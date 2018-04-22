<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\superstar;
use App\Models\Icon;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class IconController extends Controller
{
    public function addIconRedirect(){
        $superstars = DB::table('superstars')->get();
        return view('admin/addIcon',[
            'superstars' => $superstars,
            
            ]);
    }
    //Funcao para adicionar icone
    public function addIcon(Request $request){
        $this->validate($request,[
            'name' => 'required',// define que o nome é obrigatorio
            'tier' => 'required',// define que o type é obrigatorio
            'imagem'   => 'image|required' // define que a imagem do icone é requirida para o icone ser cadastrado
        ]);
            //fim da vlidação

        // Início do salvamento da imagem no "/storage/icons/nomeDaImagem.png"
        $nomeDaImagem = $request->imagem->getClientOriginalName(); // Pega o nome da imagem que foi feita upload
        $caminho = 'storage/icons/'.$nomeDaImagem; // Define o caminho que será criado com o nome da imagem
        $imagem = $request->imagem;  // Recebe a imagem na variável $imagem
        $imagem->storeAs('icons',$nomeDaImagem,'public'); // Armazena a imagem na pasta icons com o nome da imagem
    // Fim do salvamente da imagem

    // Inicio Cálculo do preço
        if ($request->tier == 1) {
            $preço = 25.00;
        }else if ($request->tier == 2) {
            $preço = 50.00;
        }else if ($request->tier == 3) {
            $preço = 75.00;
        }else {
            $preço = 100.00;
        }
    // Fim Cálculo do preço

    // Início do salvamento do icone no banco de dados
        $icon = new Icon(); // Cria um novo icone na variável $icon
        $icon->name = $request->get('name'); // Define que o nome do icone será o passado no formulário
        $icon->tier = $request->get('tier'); // Define que o tier do icone será o recebido no formulário
        $icon->price = $preço; // Define que o preço é mediante o tier escolhido no formulário
        $icon->img_url = $caminho; // Define o url da imagem do icone
        $icon->save(); // Salva o icone criado no banco de dados
        return redirect()->route('addIconRedirect');
    }
    public function editIconNameRedirect(){
        return view('admin/editIconName');
    }
    public function editIconName(Request $request){
        $this->validate($request,[
            'oldName' => 'required',// define que o nome antigo é obrigatorio
            'tier' => 'required',// define que o tier é obrigatorio
            'newName' => 'required'// define que o nome novo é obrigatorio            
        ]);
        DB::table('icons')
        ->where([
            ['name', '=', $request->oldName],
            ['tier', '=', $request->tier]
        ])->update([
            'name' => $request->newName
        ]);
        
        return redirect()->route('editIconNameRedirect');
    }
    public function editIconTierRedirect(){
        return view('admin/editIconTier');
    }
    public function editIconTier(Request $request){
        $this->validate($request,[
            'name' => 'required',// define que o nome antigo é obrigatorio
            'tier' => 'required',// define que o tier é obrigatorio
            'newTier' => 'required'// define que a nova tier é obrigatorio            
        ]);
        DB::table('icons')
        ->where([
            ['name', '=', $request->name],
            ['tier', '=', $request->tier]
        ])->update([
            'tier' => $request->newTier
        ]);
        
        return redirect()->route('editIconTierRedirect');
    }
    public function editIconPriceRedirect(){
        return view('admin/editIconPrice');
    }
    public function editIconPrice(Request $request){
        $this->validate($request,[
            'name' => 'required',// define que o nome antigo é obrigatorio
            'tier' => 'required',// define que o tier é obrigatorio
            'newPrice' => 'required'// define que a nova tier é obrigatorio            
        ]);
        DB::table('icons')
        ->where([
            ['name', '=', $request->name],
            ['tier', '=', $request->tier]
        ])->update([
            'price' => $request->newPrice
        ]);
        
        return redirect()->route('editIconPriceRedirect');
    }
    public function editIconPhotoRedirect(){     
        Storage::delete(env('APP_URL').'/'.'storage/icons/pqefp1.jpg');     
        return view('admin/editIconPhoto');
    }
    public function editIconPhoto(Request $request){
        $this->validate($request,[
            'name' => 'required',// define que o nome antigo é obrigatorio
            'tier' => 'required',// define que o tier é obrigatorio
            'imagem'   => 'image|required' // define que a imagem do icone é requirida para o icone ser editado           
        ]);        
            /*
        $photo = DB::table('icons')// SQL para pegar endereço da foto antiga
        ->select('img_url')
        ->where([
            ['name', '=', $request->name],
            ['tier', '=', $request->tier]
        ])->get();
        Storage::delete($photo);// Deleta a foto antiga
          */
        // Início do armazenamento da imagem no "/storage/icons/nomeDaImagem.png"
        $nomeDaImagem = $request->imagem->getClientOriginalName(); // Pega o nome da imagem que foi feita upload
        $caminho = 'storage/icons/'.$nomeDaImagem; // Define o caminho que será criado com o nome da imagem
        $imagem = $request->imagem;  // Recebe a imagem na variável $imagem
        $imagem->storeAs('icons',$nomeDaImagem,'public'); // Armazena a imagem na pasta icons com o nome da imagem
         // Fim do salvamente da imagem

         DB::table('icons')// SQL para atualizar a coluna img_url
         ->where([
             ['name', '=', $request->name],
             ['tier', '=', $request->tier]
         ])->update([
             'img_url' => $caminho
         ]);
        return redirect()->route('editIconPhotoRedirect');
    }
    public function darIconRedirct(){
        $icons = DB::table('icons')->get();
        return view('admin/darIcon',[
            'icons' => $icons
        ]);
    }
    public function darIcon(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'tier' => 'required'
        ]);
        $users = DB::table('users')->orderBy('id','desc')->first();
        $icon = DB::table('icons')->where([
            ['name',$request->name],['tier',$request->tier],])->first();
        for ($i=1; $i <= $users->id; $i++) {
            $user = DB::table('users')->where('id',$i)->first();
            if ($user == NULL){

            }else{
                DB::table('user_icons')->insert([
                    ['user_id' => $user->id, 'icon_id' => $icon->id]
                ]);
            }
        }
        return redirect()->route('giveIconRedirect');
    }
}
