<?php
class authAdminController extends controller {

    public function index() {
        $email = addslashes( $_POST['email'] );
        $password = addslashes( $_POST['password'] );

        if ( isset($email) && !empty($email) ) {

            $checkCredentials = $this->checkCredentials($email, $password);
            
            if (!isset( $checkCredentials['id'] )) {
                
                $dados = $checkCredentials;

                $this->loadView('loginAdmin', $dados);

            } else {
                $_SESSION['adminLogged'] = true;
                $_SESSION['idAdmin'] = $checkCredentials['id'];
                $_SESSION['adminName'] = $checkCredentials['name'];
                $_SESSION['adminEmail'] = $checkCredentials['email'];
                header("Location: admin");
            }

        } else {
            $dados = array(
                "email_wrong" => true,
            );

            $this->loadView('loginAdmin', $dados);

        }

        
    }

    public function checkCredentials($email, $password) {

        $user = new Users();

        $response = $user->verifyAdmin($email, $password, 1);
    
        return $response;

    }

}