<?php
require_once "../../../../class/blog.class.php";
$blog = new Blog;


if(isset($_POST['titulo_post']) && !empty($_POST['titulo_post'])){
    $titulo = addslashes($_POST['titulo_post']);
    $texto = $_POST['texto_blog'];
    $datePost = addslashes($_POST['date_post']);

    $result = $blog->insertNewPost($titulo, $texto, $datePost);

    if($result){
        header('Location: ../blog.php?insertPost=true');
    }
}