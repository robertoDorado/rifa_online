<?php
require_once "../class/sorteio.class.php";
$sorteioImageThumb = new Sorteio;

if(isset($_FILES['image_thumb']) && !empty($_FILES['image_thumb'])){

    $imgThumb = md5($_FILES['image_thumb']['name'] . rand(0, 999));

    if(!isset($_POST['id_imagem_thumb']) || empty($_POST['id_imagem_thumb'])){
        header('Location: ../cadastrar-sorteio.php?errorIdContest=true');
    }else{
        $idThumb = $_POST['id_imagem_thumb'];

        $alturaThumb = "178";
        $larguraThumb = "315";
        // echo "Altura pretendida: $altura - largura pretendida: $largura <br>";
        
        switch($_FILES['image_thumb']['type']):
            case 'image/jpeg';
            case 'image/pjpeg';
                $imagem_temporaria_thumb = imagecreatefromjpeg($_FILES['image_thumb']['tmp_name']);
                
                $largura_original_thumb = imagesx($imagem_temporaria_thumb);
                
                $altura_original_thumb = imagesy($imagem_temporaria_thumb);
                
                // echo "largura original: $largura_original - Altura original: $altura_original <br>";
                
                $nova_largura_thumb = $larguraThumb ? $larguraThumb : floor (($largura_original_thumb / $altura_original_thumb) * $alturaThumb);
                
                $nova_altura_thumb = $alturaThumb ? $alturaThumb : floor (($altura_original_thumb / $largura_original_thumb) * $larguraThumb);
                
                $imagem_redimensionada_thumb = imagecreatetruecolor($nova_largura_thumb, $nova_altura_thumb);
                imagecopyresampled($imagem_redimensionada_thumb, $imagem_temporaria_thumb, 0, 0, 0, 0, $nova_largura_thumb, $nova_altura_thumb, $largura_original_thumb, $altura_original_thumb);
                
                imagejpeg($imagem_redimensionada_thumb, '../img-contest/' . $imgThumb . '.jpg');
                
                $imageInsertContestThumb = $sorteioImageThumb->insertImageThumb($imgThumb . '.jpg', $idThumb);
                if($imageInsertContestThumb){
                    header('Location: ../cadastrar-sorteio.php?imageRegister=true');
                }
    
                //Caso a imagem seja extensão PNG cai nesse CASE
            case 'image/png':
            case 'image/x-png';
                    $imagem_temporaria_thumb = imagecreatefrompng($_FILES['image_thumb']['tmp_name']);
                    
                    $largura_original_thumb = imagesx($imagem_temporaria_thumb);
                    $altura_original_thumb = imagesy($imagem_temporaria_thumb);
                    // echo "Largura original: $largura_original - Altura original: $altura_original <br> ";
                    
                    /* Configura a nova largura */
                    $nova_largura_thumb = $larguraThumb ? $larguraThumb : floor(( $largura_original_thumb / $altura_original_thumb ) * $alturaThumb);
        
                    /* Configura a nova altura */
                    $nova_altura_thumb = $alturaThumb ? $alturaThumb : floor(( $altura_original_thumb / $largura_original_thumb ) * $larguraThumb);
                    
                    /* Retorna a nova imagem criada */
                    $imagem_redimensionada_thumb = imagecreatetruecolor($nova_largura_thumb, $nova_altura_thumb);
                    
                    /* Copia a nova imagem da imagem antiga com o tamanho correto */
                    //imagealphablending($imagem_redimensionada, false);
                    //imagesavealpha($imagem_redimensionada, true);
        
                    imagecopyresampled($imagem_redimensionada_thumb, $imagem_temporaria_thumb, 0, 0, 0, 0, $nova_largura_thumb, $nova_altura_thumb, $largura_original_thumb, $altura_original_thumb);
                    
                    //função imagejpeg que envia para o browser a imagem armazenada no parâmetro passado
                    imagepng($imagem_redimensionada_thumb, '../img-contest/' . $imgThumb . '.png');
                    
                    $imageInsertContestThumb = $sorteioImageThumb->insertImageThumb($imgThumb . '.png', $idThumb);
                    if($imageInsertContestThumb){
                        header('Location: ../cadastrar-sorteio.php?imageRegister=true');
                    }
            break;
        endswitch;
    }

}