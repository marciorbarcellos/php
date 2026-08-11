<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">-->

<?php
//Arquivo index responsável pela inicialização do sistema
//require_once 'sistema/configuracao.php';
//include_once './sistema/Nucleo/helpers.php';
//include './sistema/Nucleo/Mensagem.php';
//include './sistema/Nucleo/Controlador.php';
require 'vendor/autoload.php';

require 'rotas.php';







//use sistema\Nucleo\Controlador;
//
//$controlador = new Controlador();
//echo '<hr>';
//var_dump($controlador);





//use sistema\Nucleo\Helpers;

//use sistema\Nucleo\Mensagem;
//use sistema\Nucleo\Mensagem as msg;
//echo (new Mensagem())->alerta('texto de alerta');

//echo Helpers::limparNumero('651651kjhgf');

//echo Helpers::saudacao();
//
//echo '<hr>';






//$msg = new Mensagem();
//echo $msg->sucesso('Mensagem de sucesso')->renderizar();

//echo (new Mensagem())->erro('mensagem de erro')->renderizar();

//echo '<hr>';



//--- Mensagens de Alerta do bootstrap ---
//$msg = new Mensagem();
//echo $msg->sucesso('Mensagem de sucesso')->renderizar();
//echo '<hr>';
//echo $msg->erro('Mensagem de erro')->renderizar();
//echo '<hr>';
//echo $msg->alerta('Mensagem de alerta')->renderizar();
//echo '<hr>';
//echo $msg->informa('Mensagem de informações')->renderizar();
//echo '<hr>';
//var_dump($msg);





//$cpf = '004.348.491-38';
//
//var_dump(validarCpf($cpf));

//echo $limparNumero = preg_replace('/[^0-9]/', '', $cpf);






//--- Validar CPF ---
//$cpf = '00434849138';
//
//for ($t = 9; $t < 11; $t++) {
//    for ($d = 0, $c = 0; $c < $t; $c++) {
//        $d += $cpf[$c] * (($t + 1) - $c);
//    }
//    $d = ((10 * $d) % 11) % 10;
//    if ($cpf[$c] != $d) {
//        echo 'CPF Inválido';
//    }else {
//        echo 'CPF Válido';
//    }
//}
//--- Validar CPF ---



//--- TABUADA ---
//$numero = 6;

//while ($numero <= 10){
//    echo $numero++;
//}

//for($i = 1; $i <= 10; $i++){
////    echo ($i % 2 ? $i.' impar' : $i.' par').'<br>';
//    
//    echo $i.' x '.$numero.' = '.$i*$numero.'<br>';
//}
//--- TABUADA ---



//echo saudacao();



//echo slug("Adão \"Negro\" - '2022'   ").'<hr>';
//echo slug("Avatar 2: O camiho da Água").'<hr>';
//echo slug("Não! Não olhe!").'<hr>';
//echo slug("Sonic 2 - O Filme").'<hr>';
//echo slug("NOVA SÉRIE NO DISNEY+!").'<hr>';
//echo slug("100 Melhores Filmes ").'<hr>';
//echo slug("teste!@###$%6¨%%¨,*.:/?\|,");




//echo saudacao().'<hr>'.' hoje é '.dataAtual();



////$meses = array();
//$meses = ['j' => 'Janeiro', 'f' => 'Fevereiro','Março'];
//
//foreach ($meses as $chave => $valor){
//    echo $valor.'<br>';
//}
//
////echo $meses[0];
//echo '<hr>';
//var_dump($meses);
//
//echo $_SERVER['SCRIPT_FILENAME'];
//echo '<hr>';
//var_dump($_SERVER);



//var_dump(localhost());
//echo url('noticias/novas');



//echo SITE_NOME;
//echo '<hr>';
//echo constant('SITE_NOME');


//$url = 'https://unset.';
//var_dump(validarUrl($url));
//echo '<hr>';
//var_dump(validarUrlComFiltro($url));


//if(validarEmail('teste@gmail.')){
//    echo 'Endereço de e-mail válido';
//}else {
//    echo 'E-mail inválido';
//}

//var_dump(validarUrl('https://teste.com'));

//var_dump(validarEmail('teste@gmail.com'));


//echo contarTempo('2021-07-01 23:25:15');

//$data = date('d/m/Y H:i:s');
//echo $data;



//echo formatarNumero(1000000);

//echo formatarValor(50000000);

//$valor = 56;
//if($valor){
//    echo $valor;
//}else {
//    echo 0;
//}

//echo $valor ? $valor 0;
//echo $valor ?: 0;


