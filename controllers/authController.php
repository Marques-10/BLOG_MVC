<?php

class authController extends controller {

    public function index() {
        $email = addslashes( $_POST['email'] );
        $password = addslashes( $_POST['password'] );

        if ( isset($email) && !empty($email) ) {

            $checkCredentials = $this->checkCredentials($email, $password);

            // print_r($checkCredentials);
            // exit;
            
            if (!isset( $checkCredentials['id'] )) {
                
                $dados = $checkCredentials;

                $this->loadView('login', $dados);

            } else {
                $_SESSION['userLogged'] = true;
                $_SESSION['userName'] = $checkCredentials['name'];
                $_SESSION['userEmail'] = $checkCredentials['email'];
                header("Location: ". BASE_URL);
            }

        } else {
            $dados = array(
                "email_wrong" => true,
            );

            $this->loadView('login', $dados);

        }

        
    }

    public function checkCredentials($email, $password) {

        $user = new Users();

        $response = $user->verifyUser($email, $password, 2);
    
        return $response;

    }

}