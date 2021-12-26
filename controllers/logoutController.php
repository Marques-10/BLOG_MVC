<?php

class logoutController extends controller {

    public function index() {

        session_start();
        if ($_SESSION['adminLogged']) {
            unset($_SESSION['adminLogged']);
            unset($_SESSION['adminName']);
            unset($_SESSION['adminEmail']);
            header("Location: ".BASE_URL);
        } else {
            unset($_SESSION['userLogged']);
            unset($_SESSION['userName']);
            unset($_SESSION['userEmail']);
            header("Location: ".BASE_URL);
        }
        
    }

}

?>