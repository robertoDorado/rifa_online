<?php
require_once "../class/faq.class.php";
$faq = new FAQ;

if(isset($_POST['nomeCategoria']) && !empty($_POST['nomeCategoria'])){

    $categoria = addslashes($_POST['nomeCategoria']);
    $resultInsert = $faq->insertNewCategory($categoria);

    if($resultInsert){
        header("Location: ../faq-admin.php?registerCategory=true");
    }else{
        header("Location: ../faq-admin.php?limitCategory=true");
    }
}