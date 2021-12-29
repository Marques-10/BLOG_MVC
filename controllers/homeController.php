<?php

class homeController extends controller {

    public function index() {

        $dados = array();

        $p = new Posts();

        $u = new Users();

        $total_posts = $p->getTotalPosts();
        $total_users = $u->getTotalUsers();

        
        $page = 1;
        if (isset($_GET['p']) && !empty($_GET['p'])) {
            $page = addslashes($_GET['p']);
        }
        
        $por_pagina = 2;
        
        $total_paginas = ceil($total_posts / $por_pagina);
        
        $posts = $p->getUltimosPosts($page, $por_pagina);
        
        $dados['total_posts'] = $total_posts;
        $dados['total_users'] = $total_users;
        $dados['posts'] = $posts;
        $dados['total_paginas'] = $total_paginas;
        $dados['p'] = $page;

        $this->loadTemplate('home', $dados);
    
    }

}