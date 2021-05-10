<?php
require_once "../class/politica-privacidade.class.php";
$politica = new PoliticaPrivacidade;

if(isset($_POST['titulo'], $_POST['texto']) && !empty($_POST['titulo'])){
    
    $titulo = addslashes($_POST['titulo']);
    $texto = $_POST['texto'];

    $resultInsert = $politica->insertPoliticaPrivacidade($titulo, $texto);

    if($resultInsert){
        header("Location: ../politica-privacidade-admin.php?registerPolitica=true");
    }else{
        header("Location: ../politica-privacidade-admin.php?limitPolitica=true");
    }
}