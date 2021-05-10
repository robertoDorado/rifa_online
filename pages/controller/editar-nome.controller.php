<?php
require_once "../../class/login-client.class.php";
$user = new User;

if(isset($_POST['nome'], $_POST['aniversario'], $_POST['email'], $_POST['endereco'], $_POST['telefone'], $_POST['celular'], $_GET['id'])){
    
    $nome = addslashes($_POST['nome']);
    $aniversario = addslashes($_POST['aniversario']);
    $email = addslashes($_POST['email']);
    $endereco = addslashes($_POST['endereco']);
    $telefone = addslashes($_POST['telefone']);
    $celular = addslashes($_POST['celular']);
    $id = $_GET['id'];

    $resultInfo = $user->updateUserInfo($nome, $aniversario, $email, $endereco, $telefone, $celular, $id);

    if($resultInfo){
        header('Location: ../../user-info.php');
    }
}