<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\superstar;
use Illuminate\Support\Facades\DB;
use Auth;

class SuperstarsController extends Controller
{
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

    public function editarFotoRedirect(){
        $superstars = DB::table('superstars')->get(); // Recebe todos os superstar no banco de dados para facilitar localização
        // Retorna o usuário para a página de edição de foto de superstar
        return view('admin/editarFoto',[
            'superstars' => $superstars // Passa os superstars recebidos para a página
            ]);
    }

    public function editarBrandRedirect(){
        $superstars = DB::table('superstars')->get(); // Recebe todos os superstar no banco de dados para facilitar localização
        // Retorna o usuário para a página de edição de brand de superstar
        return view('admin/editarBrand',[
            'superstars' => $superstars // Passa os superstars recebidos para a página
            ]);
    }

    public function resetarSuperstarRedirect(){
        $superstars = DB::table('superstars')->get(); // Recebe todos os superstar no banco de dados para facilitar localização
        // Retorna o usuário para a página de edição de brand de superstar
        return view('admin/resetarSuperstar',[
            'superstars' => $superstars // Passa os superstars recebidos para a página
            ]);
    }

    public function consertarSuperstarRedirect(){
        $superstars = DB::table('superstars')->get(); // Recebe todos os superstar no banco de dados para facilitar localização
        // Retorna o usuário para a página de edição de brand de superstar
        return view('admin/consertarSuperstar',[
            'superstars' => $superstars // Passa os superstars recebidos para a página
            ]);
    }
    
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

         return redirect()->route('editChampionRedirect'); //Retorna o usuário para a págine de editar champion
   }

   public function editarFoto(Request $request){
    // Início da Validação
        // Valida os campos Name e Image
        $this->validate($request,[
            'name'      => 'required',
            'image'    => 'required'
        ]);
    // Fim da validação

    // Início do salvamento da imagem no "/storage/superstars/nomeDaImagem.png"
        $nomeDaImagem = $request->image->getClientOriginalName(); // Pega o nome da imagem que foi feita upload
        $caminho = 'storage/superstars/'.$nomeDaImagem; // Define o caminho que será criado com o nome da imagem
        $imagem = $request->image;  // Recebe a imagem na variável $imagem
        $imagem->storeAs('superstars',$nomeDaImagem,'public'); // Armazena a imagem na pasta superstars com o nome da imagem
    // Fim do salvamente da imagem
    
    // Salva o caminho da imagem no banco de dados
    DB::table('superstars')
        ->where('name', $request->name)
        ->update([
            'image' => $caminho
            ]);

    return redirect()->route('editPhotoRedirect'); // Retorna o usuário para a página de editar imagem do superstars
}

    public function editarBrand(Request $request){
        // Início da Validação
            // Valida os campos Name e Image
            $this->validate($request,[
                'name'      => 'required',
                'brand'    => 'required'
            ]);
        // Fim da validação

        // Encontra o superstar desejado e o armazena no $superstar
        $superstar = DB::table('superstars')
                    ->where('name',$request->name)
                    ->first();
        // Início da mudança de brand
            // Remove o superstar que mudou de brand dos times e adiciona o dinheiro do jogador de volta

            // Início remove o superstar dos times do RAW e adiciona o dinheiro de volta
                DB::table('raw_teams')->where('superstar01',$superstar->id)->increment('team_cash',$superstar->price);
                DB::table('raw_teams')
                    ->where('superstar01',$superstar->id)
                    ->update([
                        'superstar01' => 103
                    ]);
                
                DB::table('raw_teams')->where('superstar02',$superstar->id)->increment('team_cash',$superstar->price);
                DB::table('raw_teams')
                    ->where('superstar02',$superstar->id)
                    ->update([
                        'superstar02' => 102
                    ]);

                DB::table('raw_teams')->where('superstar03',$superstar->id)->increment('team_cash',$superstar->price);
                DB::table('raw_teams')
                    ->where('superstar03',$superstar->id)
                    ->update([
                        'superstar03' => 101
                    ]);

                DB::table('raw_teams')->where('superstar04',$superstar->id)->increment('team_cash',$superstar->price);
                DB::table('raw_teams')
                    ->where('superstar04',$superstar->id)
                    ->update([
                        'superstar04' => 100
                    ]);
            // Fim remove o superstar dos times do RAW e adiciona o dinheiro de volta

            // Início remove o superstar dos times do Smackdown e adiciona o dinheiro de volta
                DB::table('smackdown_teams')->where('superstar01',$superstar->id)->increment('team_cash',$superstar->price);
                DB::table('smackdown_teams')
                    ->where('superstar01',$superstar->id)
                    ->update([
                        'superstar01' => 103
                    ]);

                DB::table('smackdown_teams')->where('superstar02',$superstar->id)->increment('team_cash',$superstar->price);
                DB::table('smackdown_teams')
                    ->where('superstar02',$superstar->id)
                    ->update([
                        'superstar02' => 102
                    ]);

                DB::table('smackdown_teams')->where('superstar03',$superstar->id)->increment('team_cash',$superstar->price);
                DB::table('smackdown_teams')
                    ->where('superstar03',$superstar->id)
                    ->update([
                        'superstar03' => 101
                    ]);

                DB::table('smackdown_teams')->where('superstar04',$superstar->id)->increment('team_cash',$superstar->price);
                DB::table('smackdown_teams')
                    ->where('superstar04',$superstar->id)
                    ->update([
                        'superstar04' => 100
                    ]);
            // Fim remove o superstar dos times do Smackdown e adiciona o dinheiro de volta

            // Atualiza o superstar para a nova brand
            DB::table('superstars')
                ->where('name', $request->name)
                ->update([
                    'brand' => $request->brand
                    ]);
        // Fim da mudança de brand    
        // Retorna o usuário para a página de edição de brand do superstar
        return redirect()->route('editBrandRedirect');
    }
    public function resetarSuperstar(Request $request){
        // Início da Validação
            // Valida o campos Name
            $this->validate($request,[
                'name'      => 'required',
            ]);
        // Fim da Validação

        // Reseta o superstar para o padrão
        DB::table('superstars')
            ->where('name',$request->name)
            ->update([
                'points' => 0.0,
                'last_points' => 0.0,
                'last_show' => 0,
                'price' => 1000,
                'champion' => 0,
                'belt' => 'none'
            ]);
        // Retorna o usuário para a página de reset de superstar
        return redirect()->route('resetSuperstarRedirect');
    }
    public function consertarSuperstar(Request $request){
        // Início da Validação
            // Valida o campos Name
            $this->validate($request,[
                'name'      => 'required',
            ]);
        // Fim da Validação
        $superstar = DB::table('superstars')
                    ->where('name',$request->name)
                    ->first();
        $pontos = $superstar->points;
        $ult_preço = $superstar->price;
        if($pontos < 3.0){
                $ult_preço = $ult_preço + (100 - $pontos * 10); // Reduz o valor do superstar
        }else{ // Caso os pontos do superstar sejam iguais ou maiores que 3.0
            $ult_preço = $ult_preço - ($pontos * 10); // Aumenta o valor do superstar
        }
        // Reseta o superstar que foi pontuado de forma errada
        DB::table('superstars')
        ->where('name',$request->name)
        ->update([
            'points' => 0.0,
            'last_show' => 0,
            'price' => $ult_preço
        ]);
        return redirect()->route('fixSuperstarRedirect');
    }

}
