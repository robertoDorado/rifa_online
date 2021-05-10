<?php
require_once "conection-bd.class.php";

class PoliticaPrivacidade {

    use ConectionAdmin;

    public function insertPoliticaPrivacidade($titulo, $texto){
        if(!$this->countPoliticaPrivacidade()){
            $sql = "INSERT INTO politica_privacidade (titulo, texto) VALUES (:titulo, :texto)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":titulo", $titulo);
            $sql->bindValue(":texto", $texto);
            $sql->execute();
    
            return true;
        }else{
            return false;
        }
    }

    public function getAll(){
        $sql = "SELECT * FROM politica_privacidade";
        $sql = $this->pdo->query($sql);
        
        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }
    }

    private function countPoliticaPrivacidade(){
        $total = 0;
        $sql = "SELECT COUNT(*) as c FROM politica_privacidade";
        $sql = $this->pdo->query($sql);
        $sql = $sql->fetch();
        $total = $sql['c'];

        if($total == 1){
            return true;
        }
    }

    public function updatePoliticaPrivacidade($id, $titulo, $texto){
        $sql = "UPDATE politica_privacidade SET titulo = :titulo, texto = :texto WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":titulo", $titulo);
        $sql->bindValue(":texto", $texto);
        $sql->bindValue(":id", $id);
        $sql->execute();

        return true;
    }

    public function getPoliticaPrivacidadeById($id){
        $sql = "SELECT * FROM politica_privacidade WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetch();
        }
    }

    public function deletePoliticaPrivacidade($id){
        $sql = "DELETE FROM politica_privacidade WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        return true;
    }
}