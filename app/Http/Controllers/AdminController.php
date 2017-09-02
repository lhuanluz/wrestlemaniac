<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\superstar;
use Illuminate\Support\Facades\DB;
use Auth;

class AdminController extends Controller
{
    /*
                                                                                   
I8,        8        ,8I                                            88                                                           88                          
`8b       d8b       d8'                                     ,d     88                                                           ""                          
 "8,     ,8"8,     ,8"                                      88     88                                                                                       
  Y8     8P Y8     8P  8b,dPPYba,   ,adPPYba,  ,adPPYba,  MM88MMM  88   ,adPPYba,  88,dPYba,,adPYba,   ,adPPYYba,  8b,dPPYba,   88  ,adPPYYba,   ,adPPYba,  
  `8b   d8' `8b   d8'  88P'   "Y8  a8P_____88  I8[    ""    88     88  a8P_____88  88P'   "88"    "8a  ""     `Y8  88P'   `"8a  88  ""     `Y8  a8"     ""  
   `8a a8'   `8a a8'   88          8PP"""""""   `"Y8ba,     88     88  8PP"""""""  88      88      88  ,adPPPPP88  88       88  88  ,adPPPPP88  8b          
    `8a8'     `8a8'    88          "8b,   ,aa  aa    ]8I    88,    88  "8b,   ,aa  88      88      88  88,    ,88  88       88  88  88,    ,88  "8a,   ,aa  
     `8'       `8'     88           `"Ybbd8"'  `"YbbdP"'    "Y888  88   `"Ybbd8"'  88      88      88  `"8bbdP"Y8  88       88  88  `"8bbdP"Y8   `"Ybbd8"'  
                                                                             
    Created by: Luan Luz
    */

    // REDIRECTS
        public function adminPanel(){
            return view('admin/painelAdmin');
        }
        public function criarSuperstarRedirect(){
            // Retorna a view para inserir um superstar
            return view('admin/criarSuperstar');
        }

        public function adicionarPontosRedirect(){
            $superstars = DB::table('superstars')->get(); // Recebe todos os superstar no banco de dados para facilitar localização
            // Retorna o usuário para a página de adição de pontos para superstars
            return view('admin/adicionarPontos',[ 
                'superstars' => $superstars // Passa os superstars recebidos para a página
                ]); 
        }

        public function editarChampionRedirect(){
            $superstars = DB::table('superstars')->get(); // Recebe todos os superstar no banco de dados para facilitar localização
            // Retorna o usuário para a página de edição de champion
            return view('admin/editarChampion',[
                'superstars' => $superstars // Passa os superstars recebidos para a página
                ]);
        }

    // FUNÇÕES

        public function criarSuperstar(Request $request){
            // Início da Validação
                // Valida os campos do Nome, Brand e Imagem do superstar que deseja ser cadastrado
                $this->validate($request,[
                    'name'      => 'required', // Define que o Name é requirido para ser cadastrado
                    'brand'    => 'required', // Define que a brand do superstar deve ser informada para pode cadastrar
                    'imagem'   => 'image|required' // define que a imagem do superstar é requirida para o superstar ser cadastrado
                ]);
            // Fim da validação

            // Início do salvamento da imagem no "/storage/superstars/nomeDaImagem.png"
                $nomeDaImagem = $request->imagem->getClientOriginalName(); // Pega o nome da imagem que foi feita upload
                $caminho = 'storage/superstars/'.$nomeDaImagem; // Define o caminho que será criado com o nome da imagem
                $imagem = $request->imagem;  // Recebe a imagem na variável $imagem
                $imagem->storeAs('superstars',$nomeDaImagem,'public'); // Armazena a imagem na pasta superstars com o nome da imagem
            // Fim do salvamente da imagem
            
            // Início do salvamento do superstar no banco de dados
                $lutador = new superstar(); // Cria um novo superstar na variável $lutador
                $lutador->name = $request->get('name'); // Define que o nome do superstar será o passado no formulário
                $lutador->brand = $request->get('brand'); // Define que a brand do superstar será a recebida no formulário
                $lutador->image = $caminho; // Define o url da imagem do superstar
                $lutador->save(); // Salva o superstar criado no banco de dados
            // Fim do salvamento do superstar no banco de dados

            return redirect()->route('createSuperstarRedirect'); // Retorna o usuário para a página de criação de superstar

        }

        public function adicionarPontos(Request $request){
            // Início da Validação
                // Valida os campos Name e Points que serão adicionados ao superstar de mesmo nome
                $this->validate($request,[
                    'name'  => 'required', // Define a obrigatoriedade do nome
                    'points' => 'required' // Define a obrigatoriedade dos pontos
                ]);
            // Fim da validação

            // Pega o superstar desejado
            $superstar = DB::table('superstars')
                            ->where('name', $request->get('name'))
                            ->first();

            $ult_preço = $superstar->price; // Pega o preco do superstar desejado
            $champion = $superstar->champion; // Recebe se o superstar é champion ou não
            $pontos = $request->points; // Recebe os pontos que o superstar pontuou

            // Se o superstar for champion
            if ($champion == 1){
                $pontos += 2; // Superstar Ganha + 2 para a pontuação
            }

            // Caso os pontos do superstar sejam menores que 3
            if($pontos < 3.0){
                // Confere se o superstar ficará com menos de 500 USD que é o mínimo
                if($ult_preço - (100 - $pontos * 10) <= 500){ // Se for ficar
                    $ult_preço= 500.00; // Redefine o preço dele para 500
                }else{ // Caso o superstar possa perder o valor
                    $ult_preço = $ult_preço - (100 - $pontos * 10); // Reduz o valor do superstar
                }
            }else{ // Caso os pontos do superstar sejam iguais ou maiores que 3.0
                $ult_preço = $ult_preço + ($pontos * 10); // Aumenta o valor do superstar
            }

            // Da update na tabela dos superstars
            DB::table('superstars')
                ->where('name', $request->get('name'))
                ->update([
                    'points' => $pontos, // Atualiza os pontos dele para os pontos desejados
                    'price' => $ult_preço, // Define o novo preço do superstar
                    'last_show' => 1 // Define que o superstar participou do último show
                    ]);

            return redirect()->route('addPointsRedirect'); //Retorna o usuário para a págine de adicionar pontos
        }

        public function editarChampion(Request $request){
            // Início da Validação
                // Valida os campos Name e Points que serão adicionados ao superstar de mesmo nome
                $this->validate($request,[
                    'name'      => 'required', // Define a obrigatoriedade do nome
                    'belt'    => 'required' // Define a obrigatoriedade do título
                ]);
           // Fim da validação

           // Remove o Título do antigo dono
            $superstarOld = DB::table('superstars')
               ->where('belt',$request->belt)
               ->update([
                   'champion' => 0,
                   'belt' => 'none'
                   ]);
   
            // Adiciona o título para o novo campeão
            DB::table('superstars')
               ->where('name', $request->name)
               ->update([
                   'champion' => 1,
                   'belt' => $request->belt
                   ]);

             return redirect()->route('editarChampionRedirect'); //Retorna o usuário para a págine de editar champion
       }
}
