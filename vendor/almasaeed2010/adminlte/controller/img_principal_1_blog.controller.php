<?php
require_once "../../../../class/blog.class.php";
$blog = new Blog;

if(!isset($_POST['id_post']) && empty($_POST['id_post'])){

    header('Location: ../blog.php?emptyId=true');

}else{
    $img = addslashes(md5($_FILES['imagemPrincipal1']['name']) . rand(0, 999));
    $id = addslashes($_POST['id_post']);

    $altura = "408";
	$largura = "1010";
	
	switch($_FILES['imagemPrincipal1']['type']):
		case 'image/jpeg';
		case 'image/pjpeg';
			$imagem_temporaria = imagecreatefromjpeg($_FILES['imagemPrincipal1']['tmp_name']);
			
			$largura_original = imagesx($imagem_temporaria);
			
			$altura_original = imagesy($imagem_temporaria);
			
			// echo "largura original: $largura_original - Altura original: $altura_original <br>";
			
			$nova_largura = $largura ? $largura : floor (($largura_original / $altura_original) * $altura);
			
			$nova_altura = $altura ? $altura : floor (($altura_original / $largura_original) * $largura);
			
			$imagem_redimensionada = imagecreatetruecolor($nova_largura, $nova_altura);
			imagecopyresampled($imagem_redimensionada, $imagem_temporaria, 0, 0, 0, 0, $nova_largura, $nova_altura, $largura_original, $altura_original);
			
			imagejpeg($imagem_redimensionada, '../../../../img-blog/' . $img . '.jpg');

            $resultInsert = $blog->insertImagemPrincipal1($id, $img . ".jpg");
            if($resultInsert){
                header("Location: ../blog.php?imgPrincipal1=true&id={$id}");
            }
			
		break;
		
		//Caso a imagem seja extensão PNG cai nesse CASE
		case 'image/png':
		case 'image/x-png';
			$imagem_temporaria = imagecreatefrompng($_FILES['imagemPrincipal1']['tmp_name']);
			
			$largura_original = imagesx($imagem_temporaria);
			$altura_original = imagesy($imagem_temporaria);
			// echo "Largura original: $largura_original - Altura original: $altura_original <br> ";
			
			/* Configura a nova largura */
			$nova_largura = $largura ? $largura : floor(( $largura_original / $altura_original ) * $altura);

			/* Configura a nova altura */
			$nova_altura = $altura ? $altura : floor(( $altura_original / $largura_original ) * $largura);
			
			/* Retorna a nova imagem criada */
			$imagem_redimensionada = imagecreatetruecolor($nova_largura, $nova_altura);
			
			/* Copia a nova imagem da imagem antiga com o tamanho correto */
			//imagealphablending($imagem_redimensionada, false);
			//imagesavealpha($imagem_redimensionada, true);

			imagecopyresampled($imagem_redimensionada, $imagem_temporaria, 0, 0, 0, 0, $nova_largura, $nova_altura, $largura_original, $altura_original);
			
			//função imagejpeg que envia para o browser a imagem armazenada no parâmetro passado
			imagepng($imagem_redimensionada, '../../../../img-blog/' . $img . '.png');

            $resultInsert = $blog->insertImagemPrincipal1($id, $img . ".png");
            if($resultInsert){
                header("Location: ../blog.php?imgPrincipal1=true&id={$id}");
            }
		break;
	endswitch;
}