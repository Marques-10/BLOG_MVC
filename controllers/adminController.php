<?php
class adminController extends controller {

    public function index() {

        $dados = array(
            'admin' => 'admin testando'
        );

        $this->loadTemplate('admin', $dados);
    }

}