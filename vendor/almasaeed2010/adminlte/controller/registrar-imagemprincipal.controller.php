<?php
require_once "../class/sorteio.class.php";
$sorteioImagePrincipal = new Sorteio;

if(isset($_FILES['imagem_principal']) && !empty($_FILES['imagem_principal'])){

    $imgPrincipal = md5($_FILES['imagem_principal']['name'] . rand(0, 999));

    if(!isset($_POST['id_imagem_principal']) || empty($_POST['id_imagem_principal'])){
        header('Location: ../cadastrar-sorteio.php?errorIdContest=true');
    }else{
        $idImagePrincipal = $_POST['id_imagem_principal'];

        $alturaImagePrincipal = "270";
        $larguraImagePrincipal = "480";
        // echo "Altura pretendida: $altura - largura pretendida: $largura <br>";
        
        switch($_FILES['imagem_principal']['type']):
            case 'image/jpeg';
            case 'image/pjpeg';
                $imagem_temporaria_principal = imagecreatefromjpeg($_FILES['imagem_principal']['tmp_name']);
                
                $largura_original_principal = imagesx($imagem_temporaria_principal);
                
                $altura_original_principal = imagesy($imagem_temporaria_principal);
                
                // echo "largura original: $largura_original - Altura original: $altura_original <br>";
                
                $nova_largura_principal = $larguraImagePrincipal ? $larguraImagePrincipal : floor (($largura_original_principal / $altura_original_principal) * $alturaImagePrincipal);
                
                $nova_altura_principal = $alturaImagePrincipal ? $alturaImagePrincipal : floor (($altura_original_principal / $largura_original_principal) * $larguraImagePrincipal);
                
                $imagem_redimensionada_principal = imagecreatetruecolor($nova_largura_principal, $nova_altura_principal);
                imagecopyresampled($imagem_redimensionada_principal, $imagem_temporaria_principal, 0, 0, 0, 0, $nova_largura_principal, $nova_altura_principal, $largura_original_principal, $altura_original_principal);
                
                imagejpeg($imagem_redimensionada_principal, '../img-contest/' . $imgPrincipal . '.jpg');
                
                $insertImagePrincipal = $sorteioImagePrincipal->insertImagePrincipal($imgPrincipal . '.jpg', $idImagePrincipal);
                if($insertImagePrincipal){
                    header('Location: ../cadastrar-sorteio.php?imageRegister=true');
                }
    
                // Caso a imagem seja extensão PNG cai nesse CASE
            case 'image/png':
            case 'image/x-png';
                    $imagem_temporaria_principal = imagecreatefrompng($_FILES['imagem_principal']['tmp_name']);
                    
                    $largura_original_principal = imagesx($imagem_temporaria_principal);
                    $altura_original_principal = imagesy($imagem_temporaria_principal);
                    // echo "Largura original: $largura_original - Altura original: $altura_original <br> ";
                    
                    /* Configura a nova largura */
                    $nova_largura_principal = $larguraImagePrincipal ? $larguraImagePrincipal : floor(( $largura_original_principal / $altura_original_principal ) * $alturaImagePrincipal);
        
                    /* Configura a nova altura */
                    $nova_altura_principal = $alturaImagePrincipal ? $alturaImagePrincipal : floor(( $altura_original_principal / $largura_original_principal ) * $larguraImagePrincipal);
                    
                    /* Retorna a nova imagem criada */
                    $imagem_redimensionada_principal = imagecreatetruecolor($nova_largura_principal, $nova_altura_principal);
                    
                    /* Copia a nova imagem da imagem antiga com o tamanho correto */
                    //imagealphablending($imagem_redimensionada, false);
                    //imagesavealpha($imagem_redimensionada, true);
        
                    imagecopyresampled($imagem_redimensionada_principal, $imagem_temporaria_principal, 0, 0, 0, 0, $nova_largura_principal, $nova_altura_principal, $largura_original_principal, $altura_original_principal);
                    
                    //função imagejpeg que envia para o browser a imagem armazenada no parâmetro passado
                    imagepng($imagem_redimensionada_principal, '../img-contest/' . $imgPrincipal . '.png');
                    
                    $insertImagePrincipal = $sorteioImagePrincipal->insertImagePrincipal($imgPrincipal . '.png', $idImagePrincipal);
                    if($insertImagePrincipal){
                        header('Location: ../cadastrar-sorteio.php?imageRegister=true');
                    }
            break;
        endswitch;
    }

}
