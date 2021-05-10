<?php
// require_once "../../vendor/almasaeed2010/adminlte/class/faq.class.php";
// $faq = new FAQ;

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = addslashes($_GET['id']);

    header("Location: ../../faq.php?id=".$id."");
}