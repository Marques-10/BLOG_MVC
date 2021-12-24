<?php
class authController extends controller {

    public function index() {
        $email = addslashes( $_POST['email'] );
        $password = addslashes( $_POST['password'] );

        if ( isset($email) && !empty($email) ) {

            $checkCredentials = $this->checkCredentials($email, $password);
            
            if (!$checkCredentials) {
                $_SESSION['email_wrong'];
                header("Location: login");
            } else {
                $_SESSION['adminLogged'] = true;
                header("Location: admin");
            }

        } else {
            $_SESSION['email_wrong'];
            header("Location: login");
        }

        
    }

    public function checkCredentials($email, $password) {

        $user = new Users();

        return $user->verifyUser($email, $password);
    
    }

}