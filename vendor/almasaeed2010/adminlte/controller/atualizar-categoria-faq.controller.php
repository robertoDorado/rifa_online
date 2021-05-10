<?php
require_once "../class/faq.class.php";
$faq = new FAQ;

if(isset($_POST['nomeCategoria']) && !empty($_POST['nomeCategoria'])){
    $id = addslashes($_POST['id']);
    $categoria = addslashes($_POST['nomeCategoria']);

    $resultUpdate = $faq->updateCategory($categoria, $id);

    if($resultUpdate){
        header("Location: ../faq-admin.php?updateCategory=true&id=".$id."");
    }
}