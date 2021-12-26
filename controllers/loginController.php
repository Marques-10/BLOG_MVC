<?php

class loginController extends controller {

    public function index() {

        $dados = array();

        if (isset($_SESSION['userLogged']) || isset($_SESSION['adminLogged'])) {

            header("Location: ".BASE_URL);

        } else {

            $this->loadView('login', $dados);
        
        }

    }

}