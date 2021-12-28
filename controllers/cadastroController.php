<?php

class cadastroController extends controller {

    public function index() {

        $dados = array();

        $this->loadView('cadastro', $dados);

    }

    public function novousuario($nome="", $email="", $senha="") {
    
        $u = new Users();
    
        $resposta = array();
    
        if (isset($_POST['nome']) && !empty($_POST['nome'])) {
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $senha = $_POST['senha'];

            if (!empty($nome) && !empty($email) && !empty($senha)) {
                if($u->cadastrar($nome, $email, $senha)) {
                    $resposta['resposta'] = "success";
                } else {
                    $resposta['resposta'] = "warning";
                }
            } else {
                $resposta['resposta'] = "empty";
            }
        }
        
        $this->loadView('cadastro', $resposta);

    }

}