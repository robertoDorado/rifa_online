<?php
require_once "../class/sorteio.class.php";
$sorteioImageCarouselPrimeiro = new Sorteio;

if(isset($_FILES['imagem_carousel_1']) && !empty($_FILES['imagem_carousel_1'])){

    $imgCarousel1 = md5($_FILES['imagem_carousel_1']['name'] . rand(0, 999));

    if(!isset($_POST['id_carousel_primeiro']) || empty($_POST['id_carousel_primeiro'])){
        header('Location: ../cadastrar-sorteio.php?errorIdContest=true');
    }else{
        $idCarouselPrimeiro = $_POST['id_carousel_primeiro'];

        $alturaCarouselPrimeiro = "108";
        $larguraCarouselPrimeiro = "60";
        // echo "Altura pretendida: $altura - largura pretendida: $largura <br>";
        
        switch($_FILES['imagem_carousel_1']['type']):
            case 'image/jpeg';
            case 'image/pjpeg';
                $imagem_temporaria_carousel_primeiro = imagecreatefromjpeg($_FILES['imagem_carousel_1']['tmp_name']);
                
                $largura_original_carousel_primeiro = imagesx($imagem_temporaria_carousel_primeiro);
                
                $altura_original_carousel_primeiro = imagesy($imagem_temporaria_carousel_primeiro);
                
                // echo "largura original: $largura_original - Altura original: $altura_original <br>";
                
                $nova_largura_carousel_primeiro = $larguraCarouselPrimeiro ? $larguraCarouselPrimeiro : floor (($largura_original_carousel_primeiro / $altura_original_carousel_primeiro) * $alturaCarouselPrimeiro);
                
                $nova_altura = $altura ? $altura : floor (($altura_original / $largura_original) * $largura);
                
                $imagem_redimensionada_carousel_primeiro = imagecreatetruecolor($nova_largura_carousel_primeiro, $nova_altura_carousel_primeiro);
                imagecopyresampled($imagem_redimensionada_carousel_primeiro, $imagem_temporaria_carousel_primeiro, 0, 0, 0, 0, $nova_largura_carousel_primeiro, $nova_altura_carousel_primeiro, $largura_original_carousel_primeiro, $altura_original_carousel_primeiro);
                
                imagejpeg($imagem_redimensionada_carousel_primeiro, '../img-contest/' . $imgCarousel1 . '.jpg');
                
                $insertImageCarouselPrimeiro = $sorteioImageCarouselPrimeiro->insertCarousel1($imgCarousel1 . '.jpg', $idCarouselPrimeiro);
                if($insertImageCarouselPrimeiro){
                    header('Location: ../cadastrar-sorteio.php?imageRegister=true');
                }
    
                // Caso a imagem seja extensão PNG cai nesse CASE
            case 'image/png':
            case 'image/x-png';
                    $imagem_temporaria_carousel_primeiro = imagecreatefrompng($_FILES['imagem_carousel_1']['tmp_name']);
                    
                    $largura_original_carousel_primeiro = imagesx($imagem_temporaria_carousel_primeiro);
                    $altura_original_carousel_primeiro = imagesy($imagem_temporaria_carousel_primeiro);
                    // echo "Largura original: $largura_original - Altura original: $altura_original <br> ";
                    
                    /* Configura a nova largura */
                    $nova_largura_carousel_primeiro = $larguraCarouselPrimeiro ? $larguraCarouselPrimeiro : floor(( $largura_original_carousel_primeiro / $altura_original_carousel_primeiro ) * $alturaCarouselPrimeiro);
        
                    /* Configura a nova altura */
                    $nova_altura_carousel_primeiro = $alturaCarouselPrimeiro ? $alturaCarouselPrimeiro : floor(( $altura_original_carousel_primeiro / $largura_original_carousel_primeiro ) * $larguraCarouselPrimeiro);
                    
                    /* Retorna a nova imagem criada */
                    $imagem_redimensionada_carousel_primeiro = imagecreatetruecolor($nova_largura_carousel_primeiro, $nova_altura_carousel_primeiro);
                    
                    /* Copia a nova imagem da imagem antiga com o tamanho correto */
                    //imagealphablending($imagem_redimensionada, false);
                    //imagesavealpha($imagem_redimensionada, true);
        
                    imagecopyresampled($imagem_redimensionada_carousel_primeiro, $imagem_temporaria_carousel_primeiro, 0, 0, 0, 0, $nova_largura_carousel_primeiro, $nova_altura_carousel_primeiro, $largura_original_carousel_primeiro, $altura_original_carousel_primeiro);
                    
                    //função imagejpeg que envia para o browser a imagem armazenada no parâmetro passado
                    imagepng($imagem_redimensionada_carousel_primeiro, '../img-contest/' . $imgCarousel1 . '.png');
                    
                    $insertImageCarouselPrimeiro = $sorteioImageCarouselPrimeiro->insertCarousel1($imgCarousel1 . '.png', $idCarouselPrimeiro);
                    if($insertImageCarouselPrimeiro){
                        header('Location: ../cadastrar-sorteio.php?imageRegister=true');
                    }
            break;
        endswitch;
    }

}
