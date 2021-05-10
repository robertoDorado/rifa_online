<?php
require_once "../class/sorteio.class.php";
$sorteio = new Sorteio;

if(isset($_POST['tituloSorteio']) && !empty($_POST['tituloSorteio'])){

    $tituloSorteio = addslashes($_POST['tituloSorteio']);
    $descricaoSorteio = addslashes($_POST['descricaoSorteio']);
    $precoTicket = addslashes($_POST['precoTicket']);
    $quantidadeDePremios = addslashes($_POST['quantidadeDePremios']);
    $quantidadeDeTickets = addslashes($_POST['number']);
    $dataInicioSorteio = addslashes($_POST['dataInicioSorteio']);
    $dataFimSorteio = addslashes($_POST['dataFimSorteio']);

    $resultSorteio = $sorteio->insertNewSorteio($tituloSorteio, $descricaoSorteio, $precoTicket, $quantidadeDePremios, $quantidadeDeTickets, $dataInicioSorteio, $dataFimSorteio);

    if($resultSorteio){
        header('Location: ../cadastrar-sorteio.php?registerContest=true');
    }else{
        header('Location: ../cadastrar-sorteio.php?errorContest=true');
    }
}