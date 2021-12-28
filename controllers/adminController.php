<?php
class adminController extends controller {

    public function index() {

        $p = new Posts();

        $posts = $p->getPosts();
        
        $dados['posts'] = $posts;

        $this->loadView('admin', $dados);
    
    }

    public function adicionar() {

        if (empty($_SESSION['idAdmin'])) {
            ?>
            <script type="text/javascript">window.location.href = "<?php echo BASE_URL; ?>/loginAdmin"</script>
            <?php
            exit;
        }
     
        $data = array();

        $this->loadView('adicionar', $data);

    }

    public function salvar() {

        if (empty($_SESSION['idAdmin'])) {
            ?>
            <script type="text/javascript">window.location.href = "<?php echo BASE_URL; ?>/loginAdmin"</script>
            <?php
            exit;
        }

        $resposta = array();

        $p = new Posts();

        if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {
            $titulo = addslashes($_POST['titulo']);
            $subtitulo = addslashes($_POST['subtitulo']);
            $description = addslashes($_POST['description']);
            $foto = $_FILES['foto'];

            if (isset($foto)) {
                $foto = $_FILES['foto'];
            } else {
                $fotos = array();
            }

            $p->addPost($titulo, $subtitulo, $description, $foto);
            $resposta['status'] = 'success';

        }

        $p = new Posts();

        $posts = $p->getPosts();
        
        $dados['posts'] = $posts;
        $dados['posts']['status'] = $resposta['status'];

        $this->loadView('admin', $dados);

    }

    public function editar($id) {
        
        if (empty($_SESSION['idAdmin'])) {
            ?>
            <script type="text/javascript">window.location.href = "<?php echo BASE_URL; ?>/loginAdmin"</script>
            <?php
            exit;
        }

        $data = array();

        $p = new Posts();

        $data['data'] = $p->getPost($id);

        $this->loadView('editar', $data);

    }

    public function atualizar($id) {

        $p = new Posts();

        if ( isset($_POST['titulo']) && !empty($_POST['titulo']) ) {

            $titulo = addslashes($_POST['titulo']);
            $subtitulo = addslashes($_POST['subtitulo']);
            $description = addslashes($_POST['description']);
            $foto = $_FILES['foto'];

            if (isset($foto)) {
                $foto = $_FILES['foto'];
            } else {
                $fotos = array();
            }

            $p->editPost($id, $titulo, $subtitulo, $description, $foto);

            header("Location: ".BASE_URL."/admin");

        }

    }

    public function excluir($id) {

        $p = new Posts();

        if (isset($id) && !empty($id)) {

            $p->excluirPost($id);
            header("Location: ".BASE_URL."/admin");
        
        }

    }

}