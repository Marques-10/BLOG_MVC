<?php

class loginController extends controller {

    public function index() {

        $dados = array(
            'admin' => 'admin testando'
        );

        $this->loadView('login', $dados);

    }

}