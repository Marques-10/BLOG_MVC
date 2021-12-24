<?php

class Users extends Model {

    public function verifyUser($email, $password) {

        $sql = $this->db->prepare("Select * FROM users WHERE email = :email and password = :password");
        
        $sql->bindValue(':email', $email);
        $sql->bindValue(':password', $password);

        $sql->execute();

        $data = $sql->fetch();

        if ( count($data) > 0 ) {

            return $data['id'];
        
        } else {

            return false;
        
        }

    }

}