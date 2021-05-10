<?php
require_once "class/login-client.class.php"; 
require_once "class/cart.class.php";
require_once "vendor/almasaeed2010/adminlte/class/sorteio.class.php";
$sorteio = new Sorteio;
$cart = new Cart;
$user = new User;

if(isset($_SESSION['user'])){

    $id = $_SESSION['user'];
    $ip = $_SERVER['REMOTE_ADDR'];
  
    $user->getIdIp($id, $ip);
  
    if(isset($id) && !empty($id)){
      $data = $user->getUserCostumer($id);
    }
}else{
    header('Location: ./');
}
$arrayResult = array();
$arrayPurchase = $cart->getPurchase($data['id']);
foreach($arrayPurchase as $itemsPurchase){
    $dataFimSorteio = $sorteio->getDataFimSorteio($itemsPurchase['id_sorteio']);
    foreach($dataFimSorteio as $dataFim){
        if(date("Y-m-d") == substr($dataFim['data_fim_sorteio'], 0, 10)){
            // echo "Chegou o dia do sorteio!" . "<br>";
            $arrayNumeroSorteado = $sorteio->getNumeroSorteado($itemsPurchase['id_sorteio']);
            foreach($arrayNumeroSorteado as $itemsNumerosSorteados){
                $numerosComprados = explode('-', $itemsPurchase['numeros_comprados']);
                foreach($numerosComprados as $itemsComprados){
                    $arrayNumerosSorteados = explode("-", $itemsNumerosSorteados['resultado_concurso']);
                    foreach($arrayNumerosSorteados as $numerosSorteados){
                        foreach($numerosComprados as $itemsComprados){
                            if($numerosSorteados == $itemsComprados){
                                $arrayResult[] = array(
                                    "id" => substr(md5($itemsPurchase['id_sorteio']), 0, 3),
                                    "titulo" => $itemsNumerosSorteados['titulo_produto'],
                                    "descricao" => $itemsNumerosSorteados['descricao_produto'],
                                    "numero_sorteado" => $numerosSorteados,
                                    "data_fim_sorteio" => substr($itemsNumerosSorteados['data_fim_sorteio'], 0, 10)
                                  );
                            }
                        }
                    }
                }
            }
        }
    }
}