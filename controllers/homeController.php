<?php
class homeController extends controller {

    public function index() {

        $dados = array(
            'teste' => 'testando'
        );
        $this->loadTemplate('home', $dados);
    }

}