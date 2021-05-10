<?php
require_once "../class/sorteio.class.php";
$imgsSorteio = new Sorteio;

if(isset($_POST['id_concurso'])){

    $idConcurso = $_POST['id_concurso'];
    $arrayThumb = $imgsSorteio->renderImgThumb($idConcurso);
    $arrayPrincipal = $imgsSorteio->renderImgPrincipal($idConcurso);
    $arrayCarousel1 = $imgsSorteio->renderCarousel1($idConcurso);
    $arrayCarousel2 = $imgsSorteio->renderCarousel2($idConcurso);
    $arrayCarousel3 = $imgsSorteio->renderCarousel3($idConcurso);
    $arrayCarousel4 = $imgsSorteio->renderCarousel4($idConcurso);

    $array = array(
        'imgThumb' => $arrayThumb['img'],
        'imgPrincipal' => $arrayPrincipal['img'],
        'imgCarousel1' => $arrayCarousel1['img'],
        'imgCarousel2' => $arrayCarousel2['img'],
        'imgCarousel3' => $arrayCarousel3['img'],
        'imgCarousel4' => $arrayCarousel4['img'],
    );

    echo json_encode($array);
}