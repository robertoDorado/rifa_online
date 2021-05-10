<?php
require_once "../class/sorteio.class.php";
$sorteio = new Sorteio;

if(isset($_POST['titulo_sorteio']) && !empty($_POST['titulo_sorteio'])){

    $tituloSorteio = addslashes($_POST['titulo_sorteio']);
    $descricaoSorteio = addslashes($_POST['descricao_sorteio']);
    $precoSorteio = addslashes($_POST['preco_sorteio']);
    $qtdPremios = addslashes($_POST['qtd_premios']);
    $qtdTickets = addslashes($_POST['qtd_tickets']);
    $dataInicioSorteio = addslashes($_POST['data_inicio_sorteio']);
    $dataFimSorteio = addslashes($_POST['data_fim_sorteio']);
    $id = addslashes($_POST['id']);

    $resultUpdate = $sorteio->updateSorteio($id, $tituloSorteio, $descricaoSorteio, $precoSorteio, $qtdPremios, $qtdTickets, $dataInicioSorteio, $dataFimSorteio);

    if($resultUpdate){
        header('Location: ../cadastrar-sorteio.php?successUpdate=true');
    }else{
        header('Location: ../cadastrar-sorteio.php?errorUpdate=true');
    }

}