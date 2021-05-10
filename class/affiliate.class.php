<?php
require_once "conection-bd.class.php";
class Affiliate {

    use Conection;

    public function insertNewAffiliate($idUser, $token){
        $sql = "INSERT INTO register_affiliate SET id_user = :id_user, token = :token";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id_user', $idUser);
        $sql->bindValue(':token', $token);
        $sql->execute(); 
    }

    public function selectIdUserCount($idUser){
        $sql = "SELECT * FROM register_affiliate WHERE id_user = :id_user";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_user", $idUser);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }
    }

    public function getAllAffiliate($idUser){
        $sql = 'SELECT * FROM register_affiliate WHERE id_user = :id_user';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_user", $idUser);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }
    }

    private function protectInsertValuesAffiliate(){
        $sql = "SELECT * FROM register_value_affiliate";
        $sql = $this->pdo->query($sql);
        
        if($sql->rowCount() > 0){
            return true;
        }
    }

    public function insertValuesAffiliate($valorPago, $limitePermitido){
        if(!$this->protectInsertValuesAffiliate()){
            $sql = "INSERT INTO register_value_affiliate SET valor_pago = :valor_pago, limite_permitido = :limite_permitido";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":valor_pago", $valorPago);
            $sql->bindValue(":limite_permitido", $limitePermitido);
            $sql->execute();
    
            return true;
        }else{
            $sql = "UPDATE register_value_affiliate SET
            valor_pago = :valor_pago, limite_permitido = :limite_permitido WHERE id = 1";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":valor_pago", $valorPago);
            $sql->bindValue(":limite_permitido", $limitePermitido);
            $sql->execute();

            return false;
        }
    }

    public function getValuesAffiliate(){
        $sql = "SELECT * FROM register_value_affiliate";
        $sql = $this->pdo->query($sql);

        if($sql->rowCount() > 0){
            return $sql->fetch();
        }
    }

}