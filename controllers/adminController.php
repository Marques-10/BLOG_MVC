<?php
class adminController extends controller {

    public function index() {

        $p = new Posts();

        $posts = $p->getPosts();
        
        $dados['posts'] = $posts;

        $this->loadView('admin', $dados);
    
    }

    public function editar($id) {
        
        if (empty($_SESSION['idAdmin'])) {
            ?>
            <script type="text/javascript">window.location.href = "login.php"</script>
            <?php
            exit;
        }

        $data = array();

        $p = new Posts();

        $data['data'] = $p->getPost($id);

        $this->loadView('editar', $data);

    }

}