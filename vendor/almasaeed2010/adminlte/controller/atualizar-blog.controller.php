<?php 
require_once "../../../../class/blog.class.php";
$blog = new Blog;

if(isset($_POST['titulo_post']) && !empty($_POST['titulo_post'])){
    $titulo = addslashes($_POST['titulo_post']);
    $texto = $_POST['texto_blog'];
    $id = addslashes($_POST['id']);

    $result = $blog->updateBlog($id, $titulo, $texto);
    if($result){
        header("Location: ../blog.php?updateBlog=true&id={$id}");
    }
}