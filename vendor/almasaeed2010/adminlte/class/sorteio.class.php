<?php
require_once "conection-bd.class.php";

class Sorteio {

    use ConectionAdmin;

    public function insertNewSorteio($tituloSorteio, $descricaoSorteio, $precoTicket, $quantidadeDePremios, $quantidadeDeTickets, $dataInicioSorteio, $dataFimSorteio){
        $sql = "INSERT INTO register_contest SET titulo_produto = :titulo_produto, 
        descricao_produto = :descricao_produto, preco_produto = :preco_produto, 
        qtd_produto = :qtd_produto, qtd_tickets = :qtd_tickets, 
        data_inicio_sorteio = :data_inicio_sorteio, data_fim_sorteio = :data_fim_sorteio";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':titulo_produto', $tituloSorteio);
        $sql->bindValue(':descricao_produto', $descricaoSorteio);
        $sql->bindValue(':preco_produto', $precoTicket);
        $sql->bindValue(':qtd_produto', $quantidadeDePremios);
        $sql->bindValue(':qtd_tickets', $quantidadeDeTickets);
        $sql->bindValue(':data_inicio_sorteio', $dataInicioSorteio);
        $sql->bindValue(':data_fim_sorteio', $dataFimSorteio);
        $sql->execute();

        return true;

    }

    public function selectSorteioToUpdate($idSorteio){
        $sql = 'SELECT * FROM register_contest WHERE id = :id';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $idSorteio);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetch();
        }
    }

    public function updateSorteio($id, $tituloSorteio, $descricaoSorteio, $precoTicket, $quantidadeDePremios, $quantidadeDeTickets, $dataInicioSorteio, $dataFimSorteio){
        $sql = 'UPDATE register_contest SET titulo_produto = :titulo_produto, descricao_produto = :descricao_produto,
        preco_produto = :preco_produto, qtd_produto = :qtd_produto, qtd_tickets = :qtd_tickets, data_inicio_sorteio = :data_inicio_sorteio,
        data_fim_sorteio = :data_fim_sorteio WHERE id = :id';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->bindValue(":titulo_produto", $tituloSorteio);
        $sql->bindValue(":descricao_produto", $descricaoSorteio);
        $sql->bindValue(":preco_produto", $precoTicket);
        $sql->bindValue(":qtd_produto", $quantidadeDePremios);
        $sql->bindValue(":qtd_tickets", $quantidadeDeTickets);
        $sql->bindValue(":data_inicio_sorteio", $dataInicioSorteio);
        $sql->bindValue(":data_fim_sorteio", $dataFimSorteio);
        $sql->execute();

        return true;
    }

    public function excluirSorteio($id){
        $sql = "DELETE FROM register_contest WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function insertImageThumb($imagem, $idConcurso){
        $sql = "INSERT INTO img_thumb SET img = :img, id_concurso = :id_concurso";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_concurso", $idConcurso);
        $sql->bindValue(":img", $imagem);
        $sql->execute();

        return true;
    }

    public function insertImagePrincipal($imagem, $idConcurso){
        $sql = "INSERT INTO img_principal SET img = :img, id_concurso = :id_concurso";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":img", $imagem);
        $sql->bindValue(":id_concurso", $idConcurso);
        $sql->execute();

        return true;
    }

    public function insertCarousel1($imagem, $idConcurso){
        $sql = "INSERT INTO img_carousel_1 SET img = :img, id_concurso = :id_concurso";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":img", $imagem);
        $sql->bindValue(":id_concurso", $idConcurso);
        $sql->execute();

        return true;
    }

    public function insertCarousel2($imagem, $idConcurso){
        $sql = "INSERT INTO img_carousel_2 SET img = :img, id_concurso = :id_concurso";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":img", $imagem);
        $sql->bindValue(":id_concurso", $idConcurso);
        $sql->execute();

        return true;
    }

    public function insertCarousel3($imagem, $idConcurso){
        $sql = "INSERT INTO img_carousel_3 SET img = :img, id_concurso = :id_concurso";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":img", $imagem);
        $sql->bindValue(":id_concurso", $idConcurso);
        $sql->execute();

        return true;
    }

    public function insertCarousel4($imagem, $idConcurso){
        $sql = "INSERT INTO img_carousel_4 SET img = :img, id_concurso = :id_concurso";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":img", $imagem);
        $sql->bindValue(":id_concurso", $idConcurso);
        $sql->execute();

        return true;
    }


    public function renderImgThumb($idConcurso){
        $array = array();
        $sql = "SELECT * FROM img_thumb WHERE id_concurso = :id_concurso ORDER BY id DESC";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_concurso", $idConcurso);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $array = $sql->fetch();
            return $array;
        }
    }

    public function renderImgPrincipal($idConcurso){
        $array = array();
        $sql = "SELECT * FROM img_principal WHERE id_concurso = :id_concurso ORDER BY id DESC";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_concurso", $idConcurso);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $array = $sql->fetch();
            return $array;
        }
    }

    public function renderCarousel1($idConcurso){
        $array = array();
        $sql = "SELECT * FROM img_carousel_1 WHERE id_concurso = :id_concurso ORDER BY id DESC";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_concurso", $idConcurso);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $array = $sql->fetch();
            return $array;
        }
    }

    public function renderCarousel2($idConcurso){
        $array = array();
        $sql = "SELECT * FROM img_carousel_2 WHERE id_concurso = :id_concurso ORDER BY id DESC";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_concurso", $idConcurso);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $array = $sql->fetch();
            return $array;
        }
    }

    public function renderCarousel3($idConcurso){
        $array = array();
        $sql = "SELECT * FROM img_carousel_3 WHERE id_concurso = :id_concurso ORDER BY id DESC";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_concurso", $idConcurso);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $array = $sql->fetch();
            return $array;
        }
    }

    public function renderCarousel4($idConcurso){
        $array = array();
        $sql = "SELECT * FROM img_carousel_4 WHERE id_concurso = :id_concurso ORDER BY id DESC";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_concurso", $idConcurso);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $array = $sql->fetch();
            return $array;
        }
    }

    public function renderContestById($idConcurso){
        $sql = 'SELECT * FROM register_contest WHERE id = :id';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $idConcurso);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetch();
        }
    }

    public function selectAndInsertDataSorteio($id, $numbers){
        $array = array();
        $sql = 'SELECT * FROM register_contest WHERE id = :id';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetch();
            $sql = 'UPDATE register_contest SET resultado_concurso = :resultado_concurso WHERE id = :id';
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':resultado_concurso', $numbers);
            $sql->bindValue(':id', $array['id']);
            $sql->execute();

            return $array;
        }
            
    }

    public function countNumbers($n, $p){
        $array = array();
        for($i = 1; $i <= $p; $i++){
            $num = rand(0, $n);
            $array[] = $num;
        }
        return $array;
    }

    public function getDataFimSorteio($idSorteio){
        $sql = 'SELECT data_fim_sorteio FROM register_contest WHERE id = :id';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $idSorteio);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }
    }

    public function getNumeroSorteado($idSorteio){
        $sql = 'SELECT * FROM register_contest WHERE id = :id';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $idSorteio);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }
    }

    public function unique_multidim_array($array, $key) {
        $temp_array = array();
        $i = 0;
        $key_array = array();
       
        foreach($array as $val) {
            if (!in_array($val[$key], $key_array)) {
                $key_array[$i] = $val[$key];
                $temp_array[$i] = $val;
            }
            $i++;
        }
        return $temp_array;
    }

    public function getAll(){
        $sql = "SELECT * FROM register_contest";
        $sql = $this->pdo->query($sql);
        
        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }
    }

    public function getCountContests(){
        $total = 0;
        $sql = "SELECT COUNT(*) as c FROM register_contest WHERE data_fim_sorteio > NOW()";
        $sql = $this->pdo->query($sql);
        $sql = $sql->fetch();
        $total = $sql['c'];
        return $total;
    }

    public function getAllCountContest(){
        $total = 0;
        $sql = "SELECT COUNT(*) as c FROM register_contest";
        $sql = $this->pdo->query($sql);
        $sql = $sql->fetch();
        $total = $sql['c'];

        return $total;
    }

    public function getList($offset, $limit){
        $sql = "SELECT * FROM register_contest WHERE data_fim_sorteio > NOW() ORDER BY id DESC LIMIT $offset, $limit";
        $sql = $this->pdo->query($sql);
        
        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }
    }

    public function getLastList($offset, $limit){
        $sql = "SELECT * FROM register_contest WHERE data_fim_sorteio <= NOW() ORDER BY id DESC LIMIT $offset, $limit";
        $sql = $this->pdo->query($sql);
        
        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }
    }

    public function getCountLastList(){
        $total = 0;
        $sql = "SELECT COUNT(*) as c FROM register_contest WHERE data_fim_sorteio <= NOW() ORDER BY id DESC";
        $sql = $this->pdo->query($sql);
        $sql = $sql->fetch();
        $total = $sql['c'];
        return $total;
    }
}