<?php

class Users extends Model {

    public function verifyAdmin($email, $password, $type_user) {

        $sql = $this->db->prepare("SELECT id, name, email, type_user FROM users WHERE email = :email AND password = :password AND type_user = :type_user");
        
        $sql->bindValue(':email', $email);
        $sql->bindValue(':password', md5($password));
        $sql->bindValue(':type_user', $type_user);

        $sql->execute();

        $data = $sql->fetch();

        if ( is_array($data) && count($data) > 0 ) {

            return $data;
        
        } else {

            $is_valid_email = $this->verifyEmail($email);

            if ($is_valid_email) {

                $data_error = array(
                    "email_ok" => $email,
                    "password_wrong" => true
                );

            } else {

                $data_error = array(
                    "email_wrong" => true,
                );

            }

            return $data_error;
        
        }

    }

    public function cadastrar($nome, $email, $senha) {

        $sql = $this->db->prepare("SELECT id FROM users WHERE email = :email");
        $sql->bindValue(":email", $email);
        $sql->execute();

        if ($sql->rowCount() === 0) {
            $sql = $this->db->prepare("INSERT INTO users SET name = :nome, email = :email, password = :senha, type_user = :type_user");
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":senha", md5($senha));
            $sql->bindValue(":type_user", 2);
            $sql->execute();

            return true;
        } else {
            return false;
        }

    }

    public function verifyUser($email, $password, $type_user) {

        $sql = $this->db->prepare("SELECT id, name, email, type_user FROM users WHERE email = :email and password = :password AND type_user = :type_user");
        
        $sql->bindValue(':email', $email);
        $sql->bindValue(':password', md5($password));
        $sql->bindValue(':type_user', $type_user);

        $sql->execute();

        $data = $sql->fetch();

        if ( is_array($data) && count($data) > 0 ) {

            return $data;
        
        } else {

            $is_valid_email = $this->verifyEmail($email);
            $is_user_admin = $this->verifyType($email, 1);

            if ($is_valid_email) {

                if ($is_user_admin) {
                    $data_error = array(
                        "email_ok" => $email,
                        "user_admin" => true
                    );
                } else {
                    $data_error = array(
                        "email_ok" => $email,
                        "password_wrong" => true
                    );
                }
            
            } else {

                $data_error = array(
                    "email_wrong" => true,
                );

            }

            return $data_error;
        
        }

    }

    public function verifyEmail($email) {
        
        $sql = $this->db->prepare("SELECT id, name FROM users WHERE email = :email");
         
        $sql->bindValue(':email', $email);

        $sql->execute();

        $res = $sql->fetch();

        if ($res['id']) {
            return true;
        } else {
            return false;
        }

    }

    public function verifyType($email, $type_user) {
        
        $sql = $this->db->prepare("SELECT id, type_user FROM users WHERE email = :email AND type_user = :type_user");
         
        $sql->bindValue(':email', $email);
        $sql->bindValue(':type_user', $type_user);

        $sql->execute();

        $res = $sql->fetch();

        if ($res['id']) {
            return true;
        } else {
            return false;
        }

    }

    public function getTotalUsers() {
       
        $sql = $this->db->query("SELECT COUNT(*) as c FROM users");
        $row = $sql->fetch();

        return $row['c'];
    
    }

}