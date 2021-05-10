<?php
require_once "../../../../class/affiliate.class.php";
$affiliate = new Affiliate;

if(isset($_POST['valor'], $_POST['limite']) && !empty($_POST['valor']) && !empty($_POST['limite'])){
    $valor = addslashes($_POST['valor']);
    $limite = addslashes($_POST['limite']);

    $resultInsert = $affiliate->insertValuesAffiliate($valor, $limite);
    if($resultInsert){
        header("Location: ../limite-de-afiliados.php?insertValues=true");
    }else{
        header("Location: ../limite-de-afiliados.php?updateValues=true");
    }
}