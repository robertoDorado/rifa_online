<?php
require_once "../../../../class/blog.class.php";
$blog = new Blog;

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $result = $blog->excluirPost($id);
    if($result){
        header("Location: ../blog.php?deletePost=true&id={$id}");
    }
}