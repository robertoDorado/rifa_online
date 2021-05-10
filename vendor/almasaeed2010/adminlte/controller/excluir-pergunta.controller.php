<?php
require_once "../class/faq.class.php";
$faq = new FAQ;

if(isset($_POST['id']) && !empty($_POST['id'])){
    $id = $_POST['id'];
    $resultDeleteFaq = $faq->deleteFaq($id);

    if($resultDeleteFaq){
        echo 0;
    }
}