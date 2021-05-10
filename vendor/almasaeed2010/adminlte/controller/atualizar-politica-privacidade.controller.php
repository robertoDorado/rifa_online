<?php
require_once "../class/politica-privacidade.class.php";
$politica = new PoliticaPrivacidade;

if(isset($_POST['titulo'], $_POST['texto']) && !empty($_POST['id'])){
    $titulo = addslashes($_POST['titulo']);
    $texto = addslashes($_POST['texto']);
    $id = addslashes($_POST['id']);

    $resultUpdate = $politica->updatePoliticaPrivacidade($id, $titulo, $texto);

    if($resultUpdate){
        header("Location: ../politica-privacidade-admin.php?updatePolitica=true");
    }
}