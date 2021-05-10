<?php
require_once "../class/sorteio.class.php";
$sorteioImageCarouselQuarto = new Sorteio;

if(isset($_FILES['imagem_carousel_4']) && !empty($_FILES['imagem_carousel_4'])){

    $imgCarouselQuarto = md5($_FILES['imagem_carousel_4']['name'] . rand(0, 999));

    if(!isset($_POST['id_carousel_quarto']) || empty($_POST['id_carousel_quarto'])){
        header('Location: ../cadastrar-sorteio.php?errorIdContest=true');
    }else{
        $idCarouselQuarto = $_POST['id_carousel_quarto'];

        $alturaImageCarouselQuarto = "108";
        $larguraImageCarouselQuarto = "60";
        // echo "Altura pretendida: $altura - largura pretendida: $largura <br>";
        
        switch($_FILES['imagem_carousel_4']['type']):
            case 'image/jpeg';
            case 'image/pjpeg';
                $imagem_temporaria_carousel_quarto = imagecreatefromjpeg($_FILES['imagem_carousel_4']['tmp_name']);
                
                $largura_original_carousel_quarto = imagesx($imagem_temporaria_carousel_quarto);
                
                $altura_original_carousel_quarto = imagesy($imagem_temporaria_carousel_quarto);
                
                // echo "largura original: $largura_original - Altura original: $altura_original <br>";
                
                $nova_largura_carousel_quarto = $larguraImageCarouselQuarto ? $larguraImageCarouselQuarto : floor (($largura_original_carousel_quarto / $altura_original_carousel_quarto) * $alturaImageCarouselQuarto);
                
                $nova_altura_carousel_quarto = $alturaImageCarouselQuarto ? $alturaImageCarouselQuarto : floor (($altura_original_carousel_quarto / $largura_original_carousel_quarto) * $larguraImageCarouselQuarto);
                
                $imagem_redimensionada_carousel_quarto = imagecreatetruecolor($nova_largura_carousel_quarto, $nova_altura_carousel_quarto);
                imagecopyresampled($imagem_redimensionada_carousel_quarto, $imagem_temporaria_carousel_quarto, 0, 0, 0, 0, $nova_largura_carousel_quarto, $nova_altura_carousel_quarto, $largura_original_carousel_quarto, $altura_original_carousel_quarto);
                
                imagejpeg($imagem_redimensionada_carousel_quarto, '../img-contest/' . $imgCarouselQuarto . '.jpg');
                
                $insertImageCarouselQuarto = $sorteioImageCarouselQuarto->insertCarousel4($imgCarouselQuarto . '.jpg', $idCarouselQuarto);
                if($insertImageCarouselQuarto){
                    header('Location: ../cadastrar-sorteio.php?imageRegister=true');
                }
    
                // Caso a imagem seja extensão PNG cai nesse CASE
            case 'image/png':
            case 'image/x-png';
                    $imagem_temporaria_carousel_quarto = imagecreatefrompng($_FILES['imagem_carousel_4']['tmp_name']);
                    
                    $largura_original_carousel_quarto = imagesx($imagem_temporaria_carousel_quarto);
                    $altura_original_carousel_quarto = imagesy($imagem_temporaria_carousel_quarto);
                    // echo "Largura original: $largura_original - Altura original: $altura_original <br> ";
                    
                    /* Configura a nova largura */
                    $nova_largura_carousel_quarto = $larguraImageCarouselQuarto ? $larguraImageCarouselQuarto : floor(( $largura_original_carousel_quarto / $altura_original_carousel_quarto ) * $alturaImageCarouselQuarto);
        
                    /* Configura a nova altura */
                    $nova_altura_carousel_quarto = $alturaImageCarouselQuarto ? $alturaImageCarouselQuarto : floor(( $altura_original_carousel_quarto / $largura_original_carousel_quarto ) * $larguraImageCarouselQuarto);
                    
                    /* Retorna a nova imagem criada */
                    $imagem_redimensionada_carousel_quarto = imagecreatetruecolor($nova_largura_carousel_quarto, $nova_altura_carousel_quarto);
                    
                    /* Copia a nova imagem da imagem antiga com o tamanho correto */
                    //imagealphablending($imagem_redimensionada, false);
                    //imagesavealpha($imagem_redimensionada, true);
        
                    imagecopyresampled($imagem_redimensionada_carousel_quarto, $imagem_temporaria_carousel_quarto, 0, 0, 0, 0, $nova_largura_carousel_quarto, $nova_altura_carousel_quarto, $largura_original_carousel_quarto, $altura_original_carousel_quarto);
                    
                    //função imagejpeg que envia para o browser a imagem armazenada no parâmetro passado
                    imagepng($imagem_redimensionada_carousel_quarto, '../img-contest/' . $imgCarouselQuarto . '.png');
                    
                    $insertImageCarouselQuarto = $sorteioImageCarouselQuarto->insertCarousel4($imgCarouselQuarto . '.png', $idCarouselQuarto);
                    if($insertImageCarouselQuarto){
                        header('Location: ../cadastrar-sorteio.php?imageRegister=true');
                    }
            break;
        endswitch;
    }

}
