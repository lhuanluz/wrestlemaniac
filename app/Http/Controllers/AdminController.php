<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\superstar;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;

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
            $usuariosCadastrados = DB::table('users')->count();
            $admins = DB::table('users')->where('user_power','>=',1)->orderBy('user_power','desc')->get();
            $usuariosCadastradosHoje = DB::table('users')->whereDate('created_at', DB::raw('CURDATE()'))->count('created_at');
            $timesDoRaw = DB::table('raw_teams')
                            ->where('superstar01','!=',103)
                            ->orwhere('superstar02','!=',102)
                            ->orwhere('superstar03','!=',101)
                            ->orwhere('superstar04','!=',100)
                            ->count();

            $timesDoSmack = DB::table('smackdown_teams')
                            ->where('superstar01','!=',103)
                            ->orwhere('superstar02','!=',102)
                            ->orwhere('superstar03','!=',101)
                            ->orwhere('superstar04','!=',100)
                            ->count();

            $timesDoPPV = DB::table('ppv_teams')
                            ->where('superstar01','!=',103)
                            ->orwhere('superstar02','!=',102)
                            ->orwhere('superstar03','!=',101)
                            ->orwhere('superstar04','!=',100)
                            ->count();

            $top10Raw = DB::select('select id, name,image, sum(total) as total from (
                select s.id, s.name,s.image, count(st.superstar01) as total from superstars as s, raw_teams as st where st.superstar01 = s.id group by s.id,s.name,s.image
                union
                select s.id, s.name,s.image, count(st.superstar02) as total from superstars as s, raw_teams as st where st.superstar02 = s.id group by s.id,s.name,s.image
                union
                select s.id, s.name,s.image, count(st.superstar03) as total from superstars as s, raw_teams as st where st.superstar03 = s.id group by s.id,s.name,s.image
                union
                select s.id, s.name,s.image, count(st.superstar04) as total from superstars as s, raw_teams as st where st.superstar04 = s.id group by s.id,s.name,s.image
                ) as juncao where id not in (103,102,101,100) group by id,juncao.name,juncao.image order by total desc limit 10');

            $top10Smack = DB::select('select id, name,image, sum(total) as total from (
                select s.id, s.name,s.image, count(st.superstar01) as total from superstars as s, smackdown_teams as st where st.superstar01 = s.id group by s.id,s.name,s.image
                union
                select s.id, s.name,s.image, count(st.superstar02) as total from superstars as s, smackdown_teams as st where st.superstar02 = s.id group by s.id,s.name,s.image
                union
                select s.id, s.name,s.image, count(st.superstar03) as total from superstars as s, smackdown_teams as st where st.superstar03 = s.id group by s.id,s.name,s.image
                union
                select s.id, s.name,s.image, count(st.superstar04) as total from superstars as s, smackdown_teams as st where st.superstar04 = s.id group by s.id,s.name,s.image
                ) as juncao where id not in (103,102,101,100) group by id,juncao.name,juncao.image order by total desc limit 10');

            $top10Ppv = DB::select('select id, name,image, sum(total) as total from (
                select s.id, s.name,s.image, count(st.superstar01) as total from superstars as s, ppv_teams as st where st.superstar01 = s.id group by s.id,s.name,s.image
                union
                select s.id, s.name,s.image, count(st.superstar02) as total from superstars as s, ppv_teams as st where st.superstar02 = s.id group by s.id,s.name,s.image
                union
                select s.id, s.name,s.image, count(st.superstar03) as total from superstars as s, ppv_teams as st where st.superstar03 = s.id group by s.id,s.name,s.image
                union
                select s.id, s.name,s.image, count(st.superstar04) as total from superstars as s, ppv_teams as st where st.superstar04 = s.id group by s.id,s.name,s.image
                ) as juncao where id not in (103,102,101,100) group by id,juncao.name,juncao.image order by total desc limit 10');

            $mercados = DB::table('configs')->first();

            return view('admin/painelAdmin',[
                'usuariosCadastrados' => $usuariosCadastrados,
                'usuariosCadastradosHoje' => $usuariosCadastradosHoje,
                'admins' => $admins,
                'timesDoRaw' => $timesDoRaw,
                'timesDoSmack' => $timesDoSmack,
                'timesDoPPV' => $timesDoPPV,
                'mercados' => $mercados,
                'top10Raw' => $top10Raw,
                'top10Smack' => $top10Smack,
                'top10Ppv' => $top10Ppv
            ]);
        }

        // Redirects de Superstar

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


        // Redirects de Mercado

            public function editarMercadoStatusRedirect(){
                // Retorna o usuário para a página de edição do status do mercado
                return view('admin/mercadoStatus');  
            }

            public function editarPpvBrandRedirect(){
                // Retorna o usuário para a página de edição da brand do PPV
                return view('admin/editarPpvBrand');
            }

            public function editarPpvVisibilidadeRedirect(){
                // Retorna o usuário para a página de edição da visibilidade do PPV
                return view('admin/editarVisibilidadePpv');
            }

        // Redirects do Usuário
            public function darProRedirect(){
                // Retorna o usuário para a página de dar PRO
                return view('admin/darPro');
            }
                
            public function criarAdminRedirect(){
                // Retorna o usuário para a página de criar admin
                return view('admin/criarAdmin');
            }

            public function editarUsuarioEmailRedirect(){
                // Retorna o usuário para a página de editar email do usuário
                return view('admin/editarUsuarioEmail');
            }
            public function editarUsuarioNomeRedirect(){
                // Retorna o usuário para a página de editar o nome do usuário
                return view('admin/editarUsuarioNome');
            }
    // FUNÇÕES
// INÍCIO FUNÇÕES SUPERSTAR
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
                DB::table('raw_teams')
                    ->where('superstar01',$superstar->id)
                    ->update([
                        'superstar01' => 103
                    ])->increment('team_cash', $superstar->price);

                DB::table('raw_teams')
                    ->where('superstar02',$superstar->id)
                    ->update([
                        'superstar02' => 102
                    ])->increment('team_cash', $superstar->price);

                DB::table('raw_teams')
                    ->where('superstar03',$superstar->id)
                    ->update([
                        'superstar03' => 101
                    ])->increment('team_cash', $superstar->price);

                DB::table('raw_teams')
                    ->where('superstar04',$superstar->id)
                    ->update([
                        'superstar04' => 100
                    ])->increment('team_cash', $superstar->price);
            // Fim remove o superstar dos times do RAW e adiciona o dinheiro de volta

            // Início remove o superstar dos times do Smackdown e adiciona o dinheiro de volta
                DB::table('smackdown_teams')
                    ->where('superstar01',$superstar->id)
                    ->update([
                        'superstar01' => 103
                    ])->increment('team_cash', $superstar->price);

                DB::table('smackdown_teams')
                    ->where('superstar02',$superstar->id)
                    ->update([
                        'superstar02' => 102
                    ])->increment('team_cash', $superstar->price);

                DB::table('smackdown_teams')
                    ->where('superstar03',$superstar->id)
                    ->update([
                        'superstar03' => 101
                    ])->increment('team_cash', $superstar->price);

                DB::table('smackdown_teams')
                    ->where('superstar04',$superstar->id)
                    ->update([
                        'superstar04' => 100
                    ])->increment('team_cash', $superstar->price);
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
// FIM FUNÇÕES SUPERSTARS
// INÍCIO FUNÇÕES MERCADO

    public function editarMercadoStatus(Request $request){
        // Início da Validação
            // Valida os campos market e action
            $this->validate($request,[
                'market'      => 'required',
                'action'    => 'required'
            ]);
        // Fim da Validação

        $mercado = $request->market; // Define o mercado que deseja ser editado
        $action = $request->action; // Define a ação que é desejada: Fechar ou Abri
        
        if($mercado == 'Raw'){ //Se o usuário desejar modificar o mercado do RAW

            $tabela = 'raw_teams'; // Define a tabela a ser modificada
            $coluna = 'statusMercadoRaw'; // Define a coluna de configurações que será modificada

        }else if($mercado == 'Smackdown'){ // Se o usuário desejar modificar o mercado do SMACKDOWN

            $tabela = 'smackdown_teams'; // Define a tabela a ser modificada
            $coluna = 'statusMercadoSmackdown'; // Define a coluna de configurações que será modificada

        }else{ // Se o usuário desejar modificar o mercado do PPV

            $tabela = 'ppv_teams'; // Define a tabela a ser modificada
            $coluna = 'statusMercadoPPV'; // Define a coluna de configurações que será modificada
        }

        $quantidade = DB::table($tabela)->count('id'); // Define a quantidade de times que existem na tabela

        // Caso a ação seja para abrir o Mercado
        if($action == 'Aberto'){
            DB::table('configs')->update([
                $coluna => $action // Altera o mercado desejado para aberto
            ]);
            
            if($mercado != 'PPV'){ // Caso o mercado não seja de PPV
                // Executa as funções para todos os jogadores
                for ($i=1; $i <= $quantidade ; $i++) { 
                    // Pega os superstars de cada time
                    $team = DB::table($tabela)->where('id',$i)->first();

                    $superstar01 = DB::table('superstars')->where('id',$team->superstar01)->value('points');
                    $superstar02 = DB::table('superstars')->where('id',$team->superstar02)->value('points');
                    $superstar03 = DB::table('superstars')->where('id',$team->superstar03)->value('points');
                    $superstar04 = DB::table('superstars')->where('id',$team->superstar04)->value('points');

                    $ult_pontos = DB::table($tabela)->where('id',$i)->value('team_total_points'); // Recebe os pontos totais do time
                    $pontos = $superstar01 + $superstar02 + $superstar03 + $superstar04; // Define que os pontos atuais serão a soma dos pontos dos superstars
                    $total_pontos = $ult_pontos + $pontos; // Define que os pontos totais do time serão os anteriores mais os atuais
                    
                    // Atualiza os pontos do jogador
                    DB::table($tabela)->where('id',$i)->update([
                        'team_points' => $pontos,
                        'team_total_points' => $total_pontos
                    ]);         
                }
            }
            else{ // Caso o mercado seja de PPV
                $brand = DB::table('configs')->value('ppvBrand');
                // Executa as funções para todos os jogadores
                for ($i=1; $i <= $quantidade ; $i++) { 
                    // Pega os superstars de cada time e seus preços
                    $team = DB::table('ppv_teams')->where('id',$i)->first();

                    $superstar01 = DB::table('superstars')->where('id',$team->superstar01)->first();
                    $superstar02 = DB::table('superstars')->where('id',$team->superstar02)->first();
                    $superstar03 = DB::table('superstars')->where('id',$team->superstar03)->first();
                    $superstar04 = DB::table('superstars')->where('id',$team->superstar04)->first();
                    
                    $preço1 = $superstar01->price;
                    $preço2 = $superstar02->price;
                    $preço3 = $superstar03->price;
                    $preço4 = $superstar04->price;
                    
                    // Recebe quanto os superstars valorizaram
                    if($superstar01->points <= 2.5){
                        if($preço1 - (100 - $superstar01->points * 10) <= 500){
                            $preço1= 0.0;
                        }else{
                        $preço1 =  - (100 - $superstar01->points * 10);
                        }
                    }else{
                        $preço1 =  ($superstar01->points * 10);
                    }


                    if($superstar02->points <= 2.5){
                        if($preço2 - (100 - $superstar02->points * 10) <= 500){
                            $preço2= 0.0;
                        }else{
                        $preço2 =  - (100 - $superstar01->points * 10);
                        }
                    }else{
                        $preço2 =   ($superstar01->points * 10);
                    }


                    if($superstar03->points <= 2.5){
                        if($preço3 - (100 - $superstar03->points * 10) <= 500){
                            $preço3= 0.0;
                        }else{
                        $preço3 =  - (100 - $superstar01->points * 10);
                        }
                    }else{
                        $preço3 =   ($superstar01->points * 10);
                    }


                    if($superstar04->points <= 2.5){
                        if($preço4 - (100 - $superstar04->points * 10) <= 500){
                            $preço4= 0.0;
                        }else{
                        $preço4 =  - (100 - $superstar01->points * 10);
                        }
                    }else{
                        $preço4 =  + ($superstar01->points * 10);
                    }
                    // Define os novos valores que os times fizeram
                    $valor_ganho = $preço1 + $preço2 + $preço3 + $preço4;
                    $pontos_ganho = $superstar01->points + $superstar02->points + $superstar03->points + $superstar04->points;
                    // Caso a brand for RAW
                    if ($brand == 'Raw') {
                        // Utilize o dinheiro e os pontos feitos no PPV para o RAW
                        $ult_cash = DB::table('raw_teams')->where('id',$i)->value('team_cash');
                        $ult_pontos = DB::table('raw_teams')->where('id',$i)->value('team_total_points');
                        $ult_pontos = $ult_pontos + $pontos_ganho;
                        $ult_cash = $ult_cash + $valor_ganho;
                        DB::table('raw_teams')->where('user_id',$i)->update([
                            'team_cash' => $ult_cash,
                            'team_total_points' => $ult_pontos
                        ]);
                    }else if ($brand == 'Smackdown') { // Caso a brand for SMACKDOWN
                        // Utilize o dinheiro e os pontos feitos no PPV para o SMACKDOWN
                        $ult_pontos = DB::table('smackdown_teams')->where('id',$i)->value('team_total_points');
                        $ult_pontos = $ult_pontos + $pontos_ganho;
                        $ult_cash = DB::table('smackdown_teams')->where('id',$i)->value('team_cash');
                        $ult_cash = $ult_cash + $valor_ganho;
                        DB::table('smackdown_teams')->where('id',$i)->update([
                            'team_cash' => $ult_cash,
                            'team_total_points' => $ult_pontos
                        ]);
                    }else{ // Caso a brand for Both
                        // Utilize o dinheiro e os pontos feitos no PPV para o RAW e SMACKDOWN divididos por dois
                        $ult_pontos_Raw = DB::table('raw_teams')->where('id',$i)->value('team_total_points');
                        $ult_pontos_Smackdown = DB::table('smackdown_teams')->where('id',$i)->value('team_total_points');
                        $pontos_ganho = $pontos_ganho/2;
                        $ult_pontos_Raw = $ult_pontos_Raw + $pontos_ganho;
                        $ult_pontos_Smackdown = $ult_pontos_Smackdown + $pontos_ganho;
                        $valor_ganho = $valor_ganho/2;
                        $ult_cash_Raw = DB::table('raw_teams')->where('id',$i)->value('team_cash');
                        $ult_cash_Smackdown = DB::table('smackdown_teams')->where('id',$i)->value('team_cash');
                        
                        DB::table('raw_teams')->where('id',$i)->update([
                            'team_cash' => $ult_cash_Raw + $valor_ganho,
                            'team_total_points' => $ult_pontos_Raw
                        ]);

                        DB::table('smackdown_teams')->where('id',$i)->update([
                            'team_cash' => $ult_cash_Smackdown + $valor_ganho,
                            'team_total_points' => $ult_pontos_Smackdown
                        ]);
                    }
                    // Resete os pontos feitos para o próximo PPV
                    DB::table('ppv_teams')->where('user_id',$i)->update([
                        'team_points' => 0.0,
                        'team_total_points' => 0.0
                    ]);
                }
            }
        // CASO SEJA DESEJADO FECHAR O MERCADO
            }else{
                // Atualiza a tabela de configs
                DB::table('configs')->update([
                    $coluna => $action
                ]);

                $quantidade = DB::table('superstars')->count('id'); // Recebe a quantidade de superstars
                
                // Caso o Mercado seja PPV
                if ($mercado == 'PPV') {
                    $brand = DB::table('configs')->value('ppvBrand'); // Recebe a brand do ppv
                    if($brand == 'Raw' || $brand == 'Smackdown'){ // Caso a brand do PPV seja ambas
                        for ($i=1; $i <= $quantidade ; $i++) {
                            // Passa os pontos atuais para os últimos pontos, reseta os pontos atuais, 
                            // e determina que os superstars não apareceram no último show 
                            $ult_pontos = DB::table('superstars')->where([
                                ['id',$i],
                                ['brand',$brand],
                                ['last_show',1]
                            ])->value('last_points');

                            $pontos = DB::table('superstars')->where([
                                ['id',$i],
                                ['brand',$brand],
                                ['last_show',1]
                            ])->value('points');

                            $last_points = $pontos;
                            DB::table('superstars')->where([
                                ['id',$i],
                                ['brand',$brand],
                                ['last_show',1]
                            ])->update([
                                'last_points' => $last_points,
                                'points' => 0,
                                'last_show' => 0
                            ]);

                        }
                    }else{ // Caso a Brand seja as duas
                        for ($i=1; $i <= $quantidade ; $i++) {
                            // Passa os pontos atuais para os últimos pontos, reseta os pontos atuais, 
                            // e determina que os superstars não apareceram no último show 
                            $ult_pontos = DB::table('superstars')->where([
                                ['id',$i],
                                ['last_show',1]
                            ])->value('last_points');

                            $pontos = DB::table('superstars')->where([
                                ['id',$i],
                                ['last_show',1]
                            ])->value('points');

                            $last_points = $pontos;
                            DB::table('superstars')->where([
                                ['id',$i],
                                ['last_show',1]
                            ])->update([
                                'last_points' => $last_points,
                                'points' => 0,
                                'last_show' => 0
                            ]);

                        }
                    }
                }else{ // Caso o mercado não seja do PPV
                    // Passa os pontos atuais para os últimos pontos, reseta os pontos atuais, 
                    // e determina que os superstars não apareceram no último show
                    for ($i=1; $i <= $quantidade ; $i++) {

                        $ult_pontos = DB::table('superstars')->where([
                            ['id',$i],
                            ['brand',$mercado],
                            ['last_show',1]
                        ])->value('last_points');

                        $pontos = DB::table('superstars')->where([
                            ['id',$i],
                            ['brand',$mercado],
                            ['last_show',1]
                        ])->value('points');

                        $last_points = $pontos;
                        DB::table('superstars')->where([
                            ['id',$i],
                            ['brand',$mercado],
                            ['last_show',1]
                        ])->update([
                            'points' => 0,
                            'last_points' => $last_points,
                            'last_show' => 0
                        ]);

                    }
                }
            }

        return redirect()->route('editMarketStatusRedirect');
    }
    public function editarPpvBrand(Request $request){

        $this->validate($request,[
            'brand'      => 'required'
        ]);
        
        $brand = $request->brand;
        $userId = Auth::user()->id;

        if($brand == 'Raw'){ //Se o usuário desejar modificar o mercado do RAW
            $tabela = 'raw_teams'; // Define a tabela a ser modificada
        }else if($brand == 'Smackdown'){ // Se o usuário desejar modificar o mercado do SMACKDOWN
            $tabela = 'smackdown_teams'; // Define a tabela a ser modificada
        }

        if ($brand == 'Raw' || $brand == 'Smackdown') {
            $quantidade = DB::table('raw_teams')->count('id');
            for ($i=1; $i <= $quantidade ; $i++) {
                $team = DB::table($tabela)->where('id',$i)->first();

                $superstar01 = DB::table('superstars')->where('id',$team->superstar01)->first();
                $superstar02= DB::table('superstars')->where('id',$team->superstar02)->first();
                $superstar03 = DB::table('superstars')->where('id',$team->superstar03)->first();
                $superstar04 = DB::table('superstars')->where('id',$team->superstar04)->first();
                
                $ult_cash = DB::table($tabela)->where('id',$i)->value('team_cash');
                $ult_cash = $ult_cash + $superstar01->price + $superstar02->price = $superstar03->price + $superstar04->price; 

                DB::table('ppv_teams')
                    ->where('user_id',$i)
                    ->update([
                        'team_cash' => $ult_cash,
                        'superstar01' => 103,
                        'superstar02' => 102,
                        'superstar03' => 101,
                        'superstar04' => 100
                    ]);
            }

        }else{
            $quantidade = DB::table('ppv_teams')->count('id');
            for ($i=1; $i <= $quantidade ; $i++) { 
                $superstarId01Raw = DB::table('raw_teams')->where('id',$i)->value('superstar01');
                $superstarId02Raw = DB::table('raw_teams')->where('id',$i)->value('superstar02');
                $superstarId03Raw = DB::table('raw_teams')->where('id',$i)->value('superstar03');
                $superstarId04Raw = DB::table('raw_teams')->where('id',$i)->value('superstar04');

                $superstar01Raw = DB::table('superstars')->where('id',$superstarId01Raw)->first();
                $superstar02Raw = DB::table('superstars')->where('id',$superstarId02Raw)->first();
                $superstar03Raw = DB::table('superstars')->where('id',$superstarId03Raw)->first();
                $superstar04Raw = DB::table('superstars')->where('id',$superstarId04Raw)->first();
                
                $superstarId01Smackdown = DB::table('smackdown_teams')->where('id',$i)->value('superstar01');
                $superstarId02Smackdown = DB::table('smackdown_teams')->where('id',$i)->value('superstar02');
                $superstarId03Smackdown = DB::table('smackdown_teams')->where('id',$i)->value('superstar03');
                $superstarId04Smackdown = DB::table('smackdown_teams')->where('id',$i)->value('superstar04');

                $superstar01Smackdown = DB::table('superstars')->where('id',$superstarId01Smackdown)->first();
                $superstar02Smackdown = DB::table('superstars')->where('id',$superstarId02Smackdown)->first();
                $superstar03Smackdown = DB::table('superstars')->where('id',$superstarId03Smackdown)->first();
                $superstar04Smackdown = DB::table('superstars')->where('id',$superstarId04Smackdown)->first();

                $ult_cash_Raw = DB::table('raw_teams')->where('id',$i)->value('team_cash');
                $ult_cash_Raw = $ult_cash_Raw + $superstar01Raw->price + $superstar02Raw->price + $superstar03Raw->price + $superstar04Raw->price;
                
                $ult_cash_Smackdown = DB::table('smackdown_teams')->where('id',$i)->value('team_cash');
                $ult_cash_Smackdown = $ult_cash_Smackdown + $superstar01Smackdown->price + $superstar02Smackdown->price + $superstar03Smackdown->price + $superstar04Smackdown->price;
                
                $granaTotal = $ult_cash_Raw + $ult_cash_Smackdown;
                $grana = $granaTotal/2;

                DB::table('ppv_teams')
                    ->where('user_id',$i)
                    ->update([
                        'team_cash' => $grana,
                        'superstar01' => 103,
                        'superstar02' => 102,
                        'superstar03' => 101,
                        'superstar04' => 100
                    ]);
            }
        }
        
        DB::table('configs')->update([
            'ppvBrand' => $request->brand
        ]);
        return redirect()->route('editPpvBrandRedirect');
    }

    public function editarPpvVisibilidade(Request $request){
        // Início da Validação
            // Valida os campo de ação
            $this->validate($request,[
                    'acao'      => 'required'
            ]);
        // Fim da Validação
        // Atualiza a tabela
        DB::table('configs')->update(['statusMercadoPPV' => $request->acao]);
        return redirect()->route('editPpvVisibilityRedirect');
    }
    
    public function atualizarLigas(){
        $quantidadeLigas = DB::table('leagues')->orderBy('id','desc')->first();
        $quantidadeLigas = $quantidadeLigas->id;
        for ($i=1; $i <= $quantidadeLigas; $i++) {
            $liga = DB::table('leagues')->where('id',$i)->first(); // Pega a linha da liga do usuário
            if($liga != null){
                if($liga->owner != 1){
                    $quantidade = DB::table('users')->where('id_league',$i)->count(); // Pega quantos usuários da liga existem
                    // Começa a pegar todos os times do raw de cada membro da liga
                    $membrosRaw = DB::table('users')
                                ->join('raw_teams', 'users.id', '=', 'raw_teams.user_id')
                                ->where('id_league',$i)->take($quantidade)
                                ->orderBy('team_total_points','desc')
                                ->get();
                    // Começa a pegar todos os times do smackdown de cada membro da liga
                    $membrosSmackdown = DB::table('users')
                                ->join('smackdown_teams', 'users.id', '=', 'smackdown_teams.user_id')
                                ->where('id_league',$i)->take($quantidade)
                                ->orderBy('team_total_points','desc')
                                ->get();

                    $addR = 0; // Pontos totais do Raw na liga
                    $addS = 0; // Pontos totais do Smackdown na liga
                    
                    // For para adicionar os pontos dos times do raw e smackdown de cada membro aos pontos totais da liga raw/smackdown
                    for ($j=0; $j < $quantidade ; $j++) { 
                        $addR += $membrosRaw[$j]->team_total_points;
                        $addS +=  $membrosSmackdown[$j]->team_total_points;
                    }

                    $addR = $addR / $quantidade; // Adiciona a média do Raw dividio pela quantidade de jogadores
                    $addS = $addS / $quantidade; // Adiciona a média do Smackdown dividio pela quantidade de jogadores
                    $add = $addR + $addS; // Soma as médias para achar a pontuação da liga

                    // Faz o update na tabela
                    DB::table('leagues')->where('id',$i)->update([
                        'league_points' => $add
                    ]);
                }
            }
        }
        return redirect()->route('painelAdmin');

    }
// FIM FUNÇÕES MERCADO
// INÍCIO FUNÇÕES USUÁRIO
    public function darPro(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'tipo' => 'required'
        ]);
        DB::table('users')
            ->where('email',$request->email)
            ->update([
                'type' => $request->tipo
            ]);

        return redirect()->route('giveProRedirect');
    }

    public function criarAdmin(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'nivel' => 'required'
        ]);
        DB::table('users')
            ->where('email', $request->email)
            ->update([
                'user_power' => $request->nivel
                ]);
        return redirect()->route('createAdminRedirect');
    }

    public function editarUsuarioEmail(Request $request){
        $this->validate($request,[
            'emailAntigo' => 'required',
            'email' => 'required'
        ]);
         DB::table('users')
            ->where('email', $request->emailAntigo)
            ->update([
                'email' => $request->email
                ]);
        return redirect()->route('editUserEmailRedirect');
    }
    public function editarUsuarioNome(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'nome' => 'required'
        ]);
         DB::table('users')
            ->where('email', $request->email)
            ->update([
                'name' => $request->nome
                ]);
        return redirect()->route('editUserNameRedirect');
    }

}
