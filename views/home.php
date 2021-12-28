<?php

?>

<div class="container-fluid">
    <div class="jumbotron bg-dark text-white">
        <h2>Nós temos <?php echo $total_posts; ?> Posts.</h1>
        <p>E temos <?php echo $total_users; ?> usuários cadastrados.</p>
    </div>
</div>

<div class="container">

<h4 id="post">Últimos Posts</h4>
    <table class="table table-striped">
        <tbody>
            <?php foreach($posts as $post): ?>
                <tr>
                    <td>
                        <?php if (!empty($post['url'])): ?>
                        <img src="<?php echo BASE_URL; ?>/assets/images/posts/<?php echo $post['url']; ?>" height="150px" border="0">
                        <?php else: ?>
                        <img src="<?php echo BASE_URL; ?>/assets/images/posts/default.png" height="150px" border="0">
                        <?php endif; ?>
                    </td>
                    <td width="160px">
                        <?php echo $post['post_title']; ?><br>
                    </td>
                    <td>
                        <?php echo $post['post_subtitle']; ?><br>
                    </td>
                    <td>
                        <?php echo $post['post_description']; ?><br>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <ul class="pagination">
        <?php for ($q = 1; $q <= $total_paginas; $q++): ?>
            <li class="page-item <?php echo ($p == $q ? 'active' : ''); ?>"><a class="page-link" href="<?php echo BASE_URL; ?>?<?php
            $w = $_GET;
            $w['p'] = $q;
            // echo http_build_query($w);
            echo "p=$w[p]";
            ?>"><?php echo $q; ?></a></li>
        <?php endfor; ?>
    </ul>
</div>