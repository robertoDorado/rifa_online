<?php
session_start();
require_once "conection-bd.class.php";

class User {

    use Conection;

    public function insertUserClient($nome, $aniversario, $endereco, $telefone, $celular, $email, $senha, $img, $ip, $token, $tokenAffiliate = null){
        if(!$this->verifyEmail($email)){

            $sql = 'INSERT INTO user_client SET nome = :nome, aniversario = :aniversario, 
            endereco = :endereco, telefone = :telefone, celular = :celular, email = :email, 
            senha = :senha, perfil = :perfil, ip = :ip, token = :token, used = 0, token_affiliate = :token_affiliate';
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':aniversario', $aniversario);
            $sql->bindValue(':endereco', $endereco);
            $sql->bindValue(':telefone', $telefone);
            $sql->bindValue(':celular', $celular);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':senha', $senha);
            $sql->bindValue(':perfil', $img);
            $sql->bindValue(':ip', $ip);
            $sql->bindValue(':token', $token);
            $sql->bindValue(':token_affiliate', $tokenAffiliate);
            $sql->execute();

            return true;

        }
    }

    private function verifyEmail($email){
        $sql = 'SELECT * FROM user_client WHERE email = :email';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();

        if($sql->rowCount() > 0){
            return true;
        }

    }

    public function loginUser($email, $senha){
        $sql = 'SELECT * FROM user_client WHERE email = :email AND senha = :senha AND used = 1';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':senha', $senha);
        $sql->execute();

        if($sql->rowCount() > 0){
            
            $sql = $sql->fetch();
            $id = $sql['id'];
            $ip = $_SERVER['REMOTE_ADDR'];

            $sql = 'UPDATE user_client SET ip = :ip WHERE id = :id';
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':ip', $ip);
            $sql->bindValue(':id', $id);
            $sql->execute();

            return $_SESSION['user'] = $id;
        }
    }

    public function getIdIp($id, $ip){
        $sql = 'SELECT * FROM user_client WHERE id = :id AND ip = :ip';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->bindValue(':ip', $ip);
        $sql->execute();

        if($sql->rowCount() > 0){
            return true;
        }
    }

    public function getUserCostumer($id){
        $sql = 'SELECT * FROM user_client WHERE id = :id';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetch();
        }
    }

    public function getCountClientUsers(){
        $total = 0;
        $sql = "SELECT COUNT(*) as c FROM user_client";
        $sql = $this->pdo->query($sql);
        $sql = $sql->fetch();
        $total = $sql['c'];

        return $total;
    }

    public function verifyEmailForgotPassword($email){
        $sql = 'SELECT * FROM user_client WHERE email = :email';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetch();
        }
    }

    public function insertForgotPassword($idUser, $token, $expired){
        $sql = 'INSERT INTO forgot_password SET id_user = :id_user, token = :token, expired_token = :expired_token, used = 0';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id_user', $idUser);
        $sql->bindValue(':token', $token);
        $sql->bindValue(':expired_token', $expired);
        $sql->execute();
    } 

    public function selectCurrentToken($token){
        $sql = 'SELECT * FROM forgot_password WHERE token = :token AND
        expired_token > NOW() AND used = 0';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':token', $token);
        $sql->execute();

        if($sql->rowCount() > 0){
            return true;
        }
    }

    public function changePassword($novaSenha, $id, $token){
        $sql = 'UPDATE user_client SET senha = :senha WHERE id = :id';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':senha', $novaSenha);
        $sql->bindValue(':id', $id);
        $sql->execute();

        $sql = 'UPDATE forgot_password SET used = 1 WHERE token = :token';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':token', $token);
        $sql->execute();

        return true;
    }

    public function selectTokenConfirmEmail($token){
        $sql = "SELECT * FROM user_client WHERE token = :token";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":token", $token);
        $sql->execute();

        if($sql->rowCount() > 0){

            $sql = "UPDATE user_client SET used = 1 WHERE token = :token";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":token", $token);
            $sql->execute();

            return true;
        }
    }

    public function updateUserInfo($nome, $aniversario, $email, $endereco, $telefone, $celular, $id){
        $sql = "UPDATE user_client SET nome = :nome,
        aniversario = :aniversario, email = :email, endereco = :endereco, telefone = :telefone, 
        celular = :celular WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':aniversario', $aniversario);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':endereco', $endereco);
        $sql->bindValue(':telefone', $telefone);
        $sql->bindValue(':celular', $celular);
        $sql->bindValue(':id', $id);
        $sql->execute();

        return true;
    }

    public function loginAdmin($user, $senha){
        $sql = "SELECT * FROM user_admin WHERE user = :user AND senha = :senha";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':user', $user);
        $sql->bindValue(':senha', $senha);
        $sql->execute();

        if($sql->rowCount() > 0){

            $sql = $sql->fetch();
            $id = $sql['id'];
            $ip = $_SERVER['REMOTE_ADDR'];

            $sql = 'UPDATE user_admin SET ip = :ip WHERE id = :id';
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':ip', $ip);
            $sql->bindValue(':id', $id);
            $sql->execute();

            return $_SESSION['user_admin'] = $id;
        }
    }

    public function getIdIpAdmin($id, $ip){
        $sql = 'SELECT * FROM user_admin WHERE id = :id AND ip = :ip';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->bindValue(':ip', $ip);
        $sql->execute();

        if($sql->rowCount() > 0){
            return true;
        }
    }

    public function getUserAdmin($id){
        $sql = 'SELECT * FROM user_admin WHERE id = :id';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetch();
        }
    }

    public function getAllReferral($tokenAffiliate){
        $sql = 'SELECT * FROM user_client WHERE token_affiliate = :token_affiliate ORDER BY id DESC';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':token_affiliate', $tokenAffiliate);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }
    }

    public function selectAllUsersClient(){
        $sql = 'SELECT * FROM user_client';
        $sql = $this->pdo->query($sql);

        if($sql->rowCount() > 0){
           return $sql->fetchAll();
        }
    }
}