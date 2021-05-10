<?php
require_once "conection-bd.class.php";

class FAQ {

    use ConectionAdmin;

    public function insertNewCategory($categoria){
        if(!$this->limitInsertCategory()){
            $sql = "INSERT INTO categoria_faq (categoria) VALUES (:categoria)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":categoria", $categoria);
            $sql->execute();
            return true;
        }else{
            return false;
        }
    }

    public function getAllCategory(){
        $sql = "SELECT * FROM categoria_faq";
        $sql = $this->pdo->query($sql);
        
        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }
    }

    public function updateCategory($categoria, $id){
        $sql = "UPDATE categoria_faq SET categoria = :categoria WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->bindValue(":categoria", $categoria);
        $sql->execute();

        return true;
    }

    public function deleteCategory($id){
        $this->deleteFaqByCategory($id);
        $sql = "DELETE FROM categoria_faq WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        return true;
    }

    public function getCategoryId($id){
        $sql = "SELECT * FROM categoria_faq WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetch();
        }
    }

    private function limitInsertCategory(){
        $total = 0;
        $sql = "SELECT COUNT(*) as c FROM categoria_faq";
        $sql = $this->pdo->query($sql);
        $sql = $sql->fetch();
        $total = $sql['c'];
        
        if($total == 5){
            return true;
        }
    }

    private function deleteFaqByCategory($idCategoria){
        $sql = "DELETE FROM faq WHERE id_categoria = :id_categoria";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_categoria", $idCategoria);
        $sql->execute();

        return true;
    }

    public function insertNewFaq($pergunta, $resposta, $idCategoria){
        $sql = "INSERT INTO faq (id_categoria, pergunta, resposta) VALUES (:id_categoria, :pergunta, :resposta)";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_categoria", $idCategoria);
        $sql->bindValue(":pergunta", $pergunta);
        $sql->bindValue(":resposta", $resposta);
        $sql->execute();

        return true;
    }

    public function getAllFaq(){
        $sql = "SELECT * FROM faq";
        $sql = $this->pdo->query($sql);

        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }
    }

    public function getCategoriaName($id){
        $sql = "SELECT * FROM categoria_faq WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }
    }

    public function getFaqById($id){
        $sql = "SELECT * FROM faq WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }
    }

    public function UpdateFaq($id, $idCategoria, $pergunta, $resposta){
        $sql = "UPDATE faq SET id_categoria = :id_categoria, pergunta = :pergunta, resposta = :resposta WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->bindValue(":id_categoria", $idCategoria);
        $sql->bindValue(":pergunta", $pergunta);
        $sql->bindValue(":resposta", $resposta);
        $sql->execute();

        return true;
    }

    public function deleteFaq($id){
        $sql = "DELETE FROM faq WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        return true;
    }

    public function getFaqByIdCategoria($idCategoria){
        $sql = "SELECT * FROM faq WHERE id_categoria = :id_categoria";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_categoria", $idCategoria);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }
    }
}