<?php
require_once "conection-bd.class.php";

class JsonSorteio {

    use ConectionAdmin;

    public function getSorteio() {
        $data = array();
        $sql = "SELECT * FROM register_contest ORDER BY id DESC";
        $sql = $this->pdo->query($sql);

        if($sql->rowCount() > 0){
            $data = $sql->fetchAll();
            return $data;
        }
    }
}

$sorteio = new JsonSorteio;
$dataArray = $sorteio->getSorteio();

// $returnArray = array_map('encodeArray', $dataArray);

// function encodeArray($arr){
//     foreach($arr as $key => $value){
//         $arr[$key] = utf8_decode($value);
//     }
    
//     return $arr;
    
// }

// print_r($dataArray);

echo json_encode($dataArray, JSON_UNESCAPED_UNICODE);