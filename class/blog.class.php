<?php
require_once "conection-bd.class.php";

class Blog {

    use Conection;

    public function insertNewPost($titulo, $texto, $datePost){
        $sql = "INSERT INTO blog SET titulo = :titulo, texto = :texto, date_post = :date_post";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":titulo", $titulo);
        $sql->bindValue(":texto", $texto);
        $sql->bindValue(":date_post", $datePost);
        $sql->execute();

        return true;
    }

    public function getAll(){
        $sql = "SELECT * FROM blog ORDER BY id DESC";
        $sql = $this->pdo->query($sql);

        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }
    }

    public function insertImgThumb($id, $img){
        $sql = "INSERT INTO blog_img_thumb SET id_post = :id_post, img = :img";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_post", $id);
        $sql->bindValue(":img", $img);
        $sql->execute();

        return true;
    }

    public function getImgThumb($id){
        $sql = "SELECT img FROM blog_img_thumb WHERE id_post = :id_post ORDER BY id DESC";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_post", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetch();
        }
    }

    public function getImgPrincipal1($id){
        $sql = "SELECT img FROM blog_img_principal_1 WHERE id_post = :id_post ORDER BY id DESC";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_post", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetch();
        } 
    }

    public function getImgPrincipal2($id){
        $sql = "SELECT img FROM blog_img_principal_2 WHERE id_post = :id_post ORDER BY id DESC";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_post", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetch();
        } 
    }

    public function insertImagemPrincipal1($id, $img){
        $sql = "INSERT INTO blog_img_principal_1 SET id_post = :id_post, img = :img";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_post", $id);
        $sql->bindValue(":img", $img);
        $sql->execute();

        return true;
    }

    public function insertImagemPrincipal2($id, $img){
        $sql = "INSERT INTO blog_img_principal_2 SET id_post = :id_post, img = :img";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_post", $id);
        $sql->bindValue(":img", $img);
        $sql->execute();

        return true;
    }

    public function getPost($id){
        $sql = "SELECT * FROM blog WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetch();
        }
    }

    public function updateBlog($id, $titulo, $texto){
        $sql = "UPDATE blog SET titulo = :titulo, texto = :texto WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":titulo", $titulo);
        $sql->bindValue(":texto", $texto);
        $sql->bindValue(":id", $id);
        $sql->execute();

        return true;
    }

    public function excluirPost($id){
        $sql = "DELETE FROM blog WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        return true;
    }

    public function getLimit($offset, $limit){
        $sql = "SELECT * FROM blog LIMIT $offset, $limit";
        $sql = $this->pdo->query($sql);
        return $sql->fetchAll();
    }

    public function getCount(){
        $total = 0;
        $sql = "SELECT COUNT(*) as c FROM blog";
        $sql = $this->pdo->query($sql);
        $sql = $sql->fetch();
        $total = $sql['c'];
        return $total;
    }
}