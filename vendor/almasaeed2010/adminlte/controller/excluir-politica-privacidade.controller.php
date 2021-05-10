<?php
require_once "../class/politica-privacidade.class.php";
$politica = new PoliticaPrivacidade;

if(isset($_POST['id'])){
    $id = addslashes($_POST['id']);

    $resultDeletePolitica = $politica->deletePoliticaPrivacidade($id);

    if($resultDeletePolitica){
        echo 0;
    }
}