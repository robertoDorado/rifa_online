<?php
require_once "../class/faq.class.php";
$faq = new FAQ;

if(isset($_POST['id'])){
    $id = $_POST['id'];

    $resultDelete = $faq->deleteCategory($id);

    if($resultDelete){
        echo 0;
    }
}