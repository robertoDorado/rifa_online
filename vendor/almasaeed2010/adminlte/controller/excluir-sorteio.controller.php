<?php
require_once "../class/sorteio.class.php";
$sorteio = new Sorteio;

if(isset($_POST['id'])){

    $id = $_POST['id'];
    $sorteio->excluirSorteio($id);
}