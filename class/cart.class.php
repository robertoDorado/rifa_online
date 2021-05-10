<?php
require_once "conection-bd.class.php";

class Cart {

    use Conection;

    private function getProductInfo($id){
        $array = array();

        $sql = "SELECT * FROM register_contest WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetch();
        }

        return $array;
    }

    public function getList(){
        $array = array();
        $cart = $_SESSION['cart'];
        
        if(!empty($cart)){
            
            foreach($cart as $key => $value){
                
                if($this->getProductInfo($key)){
                    
                $info = $this->getProductInfo($key);
    
                $array[] = array(
                    'id' => $key,
                    'numeros' => $value,
                    'titulo' => $info['titulo_produto'],
                    'preco' => $info['preco_produto']
                );
            }

        }
        
    }else{

        $cart = array();

    }
        return $array;
    }

    public function delCartItem($id){
        if(isset($id)){
            unset($_SESSION['cart'][$id]);
        }
        header('Location: cart.php');
    }

    public function insertItemsCart($idUser, $idSorteio, $numeros){
        $sql = 'INSERT INTO purchase SET id_usuario = :id_usuario, id_sorteio = :id_sorteio, numeros_comprados = :numeros_comprados';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id_usuario', $idUser);
        $sql->bindValue(':id_sorteio', $idSorteio);
        $sql->bindValue(':numeros_comprados', $numeros);
        $sql->execute();

        return true;
    }

    public function getNumerosComprados($idSorteio){
        $sql = 'SELECT numeros_comprados FROM purchase WHERE id_sorteio = :id_sorteio';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id_sorteio', $idSorteio);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }
    }

    public function getPurchase($idUser){
        $sql = 'SELECT * FROM purchase WHERE id_usuario = :id_usuario';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id_usuario', $idUser);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }
    }

    public function getCountPurchase(){
        $total = 0;
        $sql = "SELECT COUNT(*) as c FROM purchase";
        $sql = $this->pdo->query($sql);
        $sql = $sql->fetch();
        $total = $sql['c'];

        return $total;
    }
}