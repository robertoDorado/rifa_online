<?php
require_once "../class/sorteio.class.php";
$sorteioImageCarouselTerceiro = new Sorteio;

if(isset($_FILES['imagem_carousel_3']) && !empty($_FILES['imagem_carousel_3'])){

    $imgCarouselTerceiro = md5($_FILES['imagem_carousel_3']['name'] . rand(0, 999));

    if(!isset($_POST['id_carousel_terceiro']) || empty($_POST['id_carousel_terceiro'])){
        header('Location: ../cadastrar-sorteio.php?errorIdContest=true');
    }else{
        $idImageCarouselTerceiro = $_POST['id_carousel_terceiro'];

        $alturaImageCarouselTerceiro = "108";
        $larguraImageCarouselTerceiro = "60";
        // echo "Altura pretendida: $altura - largura pretendida: $largura <br>";
        
        switch($_FILES['imagem_carousel_3']['type']):
            case 'image/jpeg';
            case 'image/pjpeg';
                $imagem_temporaria_carousel_terceiro = imagecreatefromjpeg($_FILES['imagem_carousel_3']['tmp_name']);
                
                $largura_original_carousel_terceiro = imagesx($imagem_temporaria_carousel_terceiro);
                
                $altura_original_carousel_terceiro = imagesy($imagem_temporaria_carousel_terceiro);
                
                // echo "largura original: $largura_original - Altura original: $altura_original <br>";
                
                $nova_largura_carousel_terceiro = $larguraImageCarouselTerceiro ? $larguraImageCarouselTerceiro : floor (($largura_original_carousel_terceiro / $altura_original_carousel_terceiro) * $alturaImageCarouselTerceiro);
                
                $nova_altura_carousel_terceiro = $alturaImageCarouselTerceiro ? $alturaImageCarouselTerceiro : floor (($altura_original_carousel_terceiro / $largura_original_carousel_terceiro) * $larguraImageCarouselTerceiro);
                
                $imagem_redimensionada_carousel_terceiro = imagecreatetruecolor($nova_largura_carousel_terceiro, $nova_altura_carousel_terceiro);
                imagecopyresampled($imagem_redimensionada_carousel_terceiro, $imagem_temporaria_carousel_terceiro, 0, 0, 0, 0, $nova_largura_carousel_terceiro, $nova_altura_carousel_terceiro, $largura_original_carousel_terceiro, $altura_original_carousel_terceiro);
                
                imagejpeg($imagem_redimensionada_carousel_terceiro, '../img-contest/' . $imgCarouselTerceiro . '.jpg');
                
                $insertImageCarouselTerceiro = $sorteioImageCarouselTerceiro->insertCarousel3($imgCarouselTerceiro . '.jpg', $idImageCarouselTerceiro);
                if($insertImageCarouselTerceiro){
                    header('Location: ../cadastrar-sorteio.php?imageRegister=true');
                }
    
                // Caso a imagem seja extensão PNG cai nesse CASE
            case 'image/png':
            case 'image/x-png';
                    $imagem_temporaria_carousel_terceiro = imagecreatefrompng($_FILES['imagem_carousel_3']['tmp_name']);
                    
                    $largura_original_carousel_terceiro = imagesx($imagem_temporaria_carousel_terceiro);
                    $altura_original_carousel_terceiro = imagesy($imagem_temporaria_carousel_terceiro);
                    // echo "Largura original: $largura_original - Altura original: $altura_original <br> ";
                    
                    /* Configura a nova largura */
                    $nova_largura_carousel_terceiro = $larguraImageCarouselTerceiro ? $larguraImageCarouselTerceiro : floor(( $largura_original_carousel_terceiro / $altura_original_carousel_terceiro ) * $alturaImageCarouselTerceiro);
        
                    /* Configura a nova altura */
                    $nova_altura_carousel_terceiro = $alturaImageCarouselTerceiro ? $alturaImageCarouselTerceiro : floor(( $altura_original_carousel_terceiro / $largura_original_carousel_terceiro ) * $larguraImageCarouselTerceiro);
                    
                    /* Retorna a nova imagem criada */
                    $imagem_redimensionada_carousel_terceiro = imagecreatetruecolor($nova_largura_carousel_terceiro, $nova_altura_carousel_terceiro);
                    
                    /* Copia a nova imagem da imagem antiga com o tamanho correto */
                    //imagealphablending($imagem_redimensionada, false);
                    //imagesavealpha($imagem_redimensionada, true);
        
                    imagecopyresampled($imagem_redimensionada_carousel_terceiro, $imagem_temporaria_carousel_terceiro, 0, 0, 0, 0, $nova_largura_carousel_terceiro, $nova_altura_carousel_terceiro, $largura_original_carousel_terceiro, $altura_original_carousel_terceiro);
                    
                    //função imagejpeg que envia para o browser a imagem armazenada no parâmetro passado
                    imagepng($imagem_redimensionada_carousel_terceiro, '../img-contest/' . $imgCarouselTerceiro . '.png');
                    
                    $insertImageCarouselTerceiro = $sorteioImageCarouselTerceiro->insertCarousel3($imgCarouselTerceiro . '.png', $idImageCarouselTerceiro);
                    if($insertImageCarouselTerceiro){
                        header('Location: ../cadastrar-sorteio.php?imageRegister=true');
                    }
            break;
        endswitch;
    }

}
