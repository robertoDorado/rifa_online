<?php
require_once "../../class/login-client.class.php";
$user = new User;

if(isset($_POST['token'])){

    $token = $_POST['token'];

    $resultConfirmToken = $user->selectTokenConfirmEmail($token);

    if($resultConfirmToken){
        header("Location: ../../email-confirmado-sucesso.php");
    }
}
