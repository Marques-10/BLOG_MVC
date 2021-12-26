<?php

class loginAdminController extends controller {

    public function index() {

        $dados = array();

        if (isset($_SESSION['adminLogged']) || isset($_SESSION['userLogged'])) {

            header("Location: ".BASE_URL);

        } else {

            $this->loadView('loginAdmin', $dados);
        
        }

    }

}