<?php
require_once "../class/faq.class.php";
$faq = new FAQ;

if(isset($_POST['pergunta'], $_POST['resposta']) && !empty($_POST['id_categoria'])){
    $pergunta = addslashes($_POST['pergunta']);
    $resposta = addslashes($_POST['resposta']);
    $idCategoria = addslashes($_POST['id_categoria']);

    $resultInsertFaq = $faq->insertNewFaq($pergunta, $resposta, $idCategoria);

    if($resultInsertFaq){
        header("Location:../faq-admin.php?registerFaq=true");
    }
}