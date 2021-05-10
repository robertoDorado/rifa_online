<?php
require_once "../class/faq.class.php";
$faq = new FAQ;

if(isset($_POST['pergunta']) && !empty($_POST['id_categoria'])){
    $pergunta = addslashes($_POST['pergunta']);
    $resposta = addslashes($_POST['resposta']);
    $idCategoria = addslashes($_POST['id_categoria']);
    $id = addslashes($_POST['id']);

    $resultUpdateFaq = $faq->UpdateFaq($id, $idCategoria, $pergunta, $resposta);

    if($resultUpdateFaq){
        header("Location: ../faq-admin.php?updateFaq=true");
    }
}