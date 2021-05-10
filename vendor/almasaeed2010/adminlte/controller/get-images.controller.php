<?php
require_once "../../../../class/blog.class.php";
$blog = new Blog;

if(isset($_POST['id']) && !empty($_POST['id'])){

    $id = addslashes($_POST['id']);
    
    $returnImgThumb = $blog->getImgThumb($id);
    $returnImgPrincipal1 = $blog->getImgPrincipal1($id);
    $returnImgPrincipal2 = $blog->getImgPrincipal2($id);

    $array = array(
        'imgThumb' => $returnImgThumb['img'],
        'imgPrincipal1' => $returnImgPrincipal1['img'],
        'imgPrincipal2' => $returnImgPrincipal2['img']
    );

    $json = json_encode($array);
    echo $json;
}