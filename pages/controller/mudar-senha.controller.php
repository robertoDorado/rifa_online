<?php
require_once "../../class/login-client.class.php";
$user = new User;

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $novaSenha = md5(addslashes($_POST['novaSenha']));
    $id = $_POST['idUser'];
    $token = $_POST['token'];
    $resultClient = $user->changePassword($novaSenha, $id, $token);
        
    if($resultClient){
        echo 1;
        // header("Location: ../../senha-alterada.php");
    }

}