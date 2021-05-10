<?php
require_once "../class/sorteio.class.php";
$sorteio = new Sorteio;

if(isset($_GET['idSorteio']) && !empty($_GET['idSorteio'])){

    $id = $_GET['idSorteio'];
    $numero = $_GET['numero'];
    $premios = $_GET['premios'];

    $resultArrayNumbers = $sorteio->countNumbers($numero, $premios);

    $numerosSorteados = implode('-', $resultArrayNumbers);
    
    $resultSelect = $sorteio->selectAndInsertDataSorteio($id, $numerosSorteados);

    if($resultSelect){
        header("Location: ../cadastrar-sorteio.php?id=$id");
    }
    
}