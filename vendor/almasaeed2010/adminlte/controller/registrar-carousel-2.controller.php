<?php
require_once "../class/sorteio.class.php";
$sorteioImageCarouselSegundo = new Sorteio;

if(isset($_FILES['imagem_carousel_2']) && !empty($_FILES['imagem_carousel_2'])){

    $imgCarouselSegundo = md5($_FILES['imagem_carousel_2']['name'] . rand(0, 999));

    if(!isset($_POST['id_carousel_segundo']) || empty($_POST['id_carousel_segundo'])){
        header('Location: ../cadastrar-sorteio.php?errorIdContest=true');
    }else{
        $idCarouselSegundo = $_POST['id_carousel_segundo'];

        $alturaImageCarouselSegundo = "108";
        $larguraImageCarouselSegundo = "60";
        // echo "Altura pretendida: $altura - largura pretendida: $largura <br>";
        
        switch($_FILES['imagem_carousel_2']['type']):
            case 'image/jpeg';
            case 'image/pjpeg';
                $imagem_temporaria_carousel_segundo = imagecreatefromjpeg($_FILES['imagem_carousel_2']['tmp_name']);
                
                $largura_original_carousel_segundo = imagesx($imagem_temporaria_carousel_segundo);
                
                $altura_original_carousel_segundo = imagesy($imagem_temporaria_carousel_segundo);
                
                // echo "largura original: $largura_original - Altura original: $altura_original <br>";
                
                $nova_largura_carousel_segundo = $larguraImageCarouselSegundo ? $larguraImageCarouselSegundo : floor (($largura_original_carousel_segundo / $altura_original_carousel_segundo) * $alturaImageCarouselSegundo);
                
                $nova_altura_carousel_segundo = $alturaImageCarouselSegundo ? $alturaImageCarouselSegundo : floor (($altura_original_carousel_segundo / $largura_original_carousel_segundo) * $larguraImageCarouselSegundo);
                
                $imagem_redimensionada_carousel_segundo = imagecreatetruecolor($nova_largura_carousel_segundo, $nova_altura_carousel_segundo);
                imagecopyresampled($imagem_redimensionada_carousel_segundo, $imagem_temporaria_carousel_segundo, 0, 0, 0, 0, $nova_largura_carousel_segundo, $nova_altura_carousel_segundo, $largura_original_carousel_segundo, $altura_original_carousel_segundo);
                
                imagejpeg($imagem_redimensionada_carousel_segundo, '../img-contest/' . $imgCarouselSegundo . '.jpg');
                
                $insertImageCarouselSegundo = $sorteioImageCarouselSegundo->insertCarousel2($imgCarouselSegundo . '.jpg', $idCarouselSegundo);
                if($insertImageCarouselSegundo){
                    header('Location: ../cadastrar-sorteio.php?imageRegister=true');
                }
    
                // Caso a imagem seja extensão PNG cai nesse CASE
            case 'image/png':
            case 'image/x-png';
                    $imagem_temporaria_carousel_segundo = imagecreatefrompng($_FILES['imagem_carousel_2']['tmp_name']);
                    
                    $largura_original_carousel_segundo = imagesx($imagem_temporaria_carousel_segundo);
                    $altura_original_carousel_segundo = imagesy($imagem_temporaria_carousel_segundo);
                    // echo "Largura original: $largura_original - Altura original: $altura_original <br> ";
                    
                    /* Configura a nova largura */
                    $nova_largura_carousel_segundo = $larguraImageCarouselSegundo ? $larguraImageCarouselSegundo : floor(( $largura_original_carousel_segundo / $altura_original_carousel_segundo ) * $alturaImageCarouselSegundo);
        
                    /* Configura a nova altura */
                    $nova_altura_carousel_segundo = $alturaImageCarouselSegundo ? $alturaImageCarouselSegundo : floor(( $altura_original_carousel_segundo / $largura_original_carousel_segundo ) * $larguraImageCarouselSegundo);
                    
                    /* Retorna a nova imagem criada */
                    $imagem_redimensionada_carousel_segundo = imagecreatetruecolor($nova_largura_carousel_segundo, $nova_altura_carousel_segundo);
                    
                    /* Copia a nova imagem da imagem antiga com o tamanho correto */
                    //imagealphablending($imagem_redimensionada, false);
                    //imagesavealpha($imagem_redimensionada, true);
        
                    imagecopyresampled($imagem_redimensionada_carousel_segundo, $imagem_temporaria_carousel_segundo, 0, 0, 0, 0, $nova_largura_carousel_segundo, $nova_altura_carousel_segundo, $largura_original_carousel_segundo, $altura_original_carousel_segundo);
                    
                    //função imagejpeg que envia para o browser a imagem armazenada no parâmetro passado
                    imagepng($imagem_redimensionada_carousel_segundo, '../img-contest/' . $imgCarouselSegundo . '.png');
                    
                    $insertImageCarouselSegundo = $sorteioImageCarouselSegundo->insertCarousel2($imgCarouselSegundo . '.png', $idCarouselSegundo);
                    if($insertImageCarouselSegundo){
                        header('Location: ../cadastrar-sorteio.php?imageRegister=true');
                    }
            break;
        endswitch;
    }

}
