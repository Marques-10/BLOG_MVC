<?php

class Posts extends Model {

    public function dumpDatabase() {

        $name_bkp = "bkp_" . date('Y-m-d') . ".sql";

        exec("C:/wamp64/bin/mysql/mysql5.7.31/bin/mysqldump -u root blog_mvc > database/$name_bkp");
        // C:/wamp64/bin/mysql/mysql5.7.31/bin/mysqldump

        return $name_bkp;

    }

    public function getUltimosPosts($page, $perPage) {
        
        $offset = ($page - 1) * $perPage;

        $array = array();

        $sql = $this->db->prepare("SELECT 
            *, 
            (select posts_images.url from posts_images where 
                posts_images.id_post = posts.id limit 1) as url
            FROM posts ORDER BY id DESC LIMIT $offset, $perPage");
        
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        
        // echo "SELECT 
        // *, 
        // (select posts_images.url from posts_images where 
        //     posts_images.id_post = posts.id limit 1) as url
        // FROM posts ORDER BY id DESC LIMIT $offset, $perPage";

        return $array;

    }

    public function getPosts() {

        $array = array();

        $sql = $this->db->prepare(
            "SELECT *,
                (select posts_images.url from posts_images where posts_images.id_post = posts.id limit 1) as url
            FROM posts WHERE id_user = :id_user");
        
        $sql->bindValue(':id_user', $_SESSION['idAdmin']);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    
    }

    public function getPost($id) {

        $array = array();

        $sql = $this->db->prepare("SELECT * FROM posts WHERE id = :id AND id_user = :id_user");
        $sql->bindValue(":id", $id);
        $sql->bindValue(":id_user", $_SESSION['idAdmin']);

        $sql->execute();

        if($sql->rowCount() > 0) {
			$array = $sql->fetch();
			$array['fotos'] = array();

			$sql = $this->db->prepare("SELECT id,url FROM posts_images WHERE id_post = :id_post");
			$sql->bindValue(":id_post", $id);
			$sql->execute();

			if($sql->rowCount() > 0) {
				$array['fotos'] = $sql->fetchAll();
			}

		}

        return $array;
    }

    public function addPost($titulo, $subtitulo, $description, $foto) {
        
        $sql = $this->db->prepare(
            "INSERT INTO posts SET 
                post_title = :titulo,
                post_subtitle = :subtitulo,
                post_description = :description,
                id_user = :id_user");

        $sql->bindValue(":titulo", $titulo);
        $sql->bindValue(":subtitulo", $subtitulo);
        $sql->bindValue(":description", $description);
        $sql->bindValue(":id_user", $_SESSION['idAdmin']);
        $sql->execute();

        $id_iserted = $this->db->lastInsertId();

        if (count($foto) > 0) {
            for ($q = 0; $q < count($foto['tmp_name']); $q++) {
                $tipo = $foto['type'][$q];
                if (in_array($tipo, array('image/jpeg', 'image/png'))) {
                    $tmpname = md5(time().rand(0,9999)).'.jpg';

                    move_uploaded_file($foto['tmp_name'][$q], "C:\wamp64\www\BLOG_MVC\assets\images\posts/" . $tmpname);

                    list($width_orig, $height_orig) = getimagesize("C:\wamp64\www\BLOG_MVC\assets\images\posts/" . $tmpname);
                    $ratio = $width_orig / $height_orig;

                    $width = 500;
                    $height = 500;

                    if ($width/$height > $ratio) {
                        $width = $height * $ratio;
                    } else {
                        $height = $width/$ratio;
                    }

                    $img = imagecreatetruecolor($width, $height);
                    if ($tipo == 'image/jpeg') {
                        $origi = imagecreatefromjpeg("C:\wamp64\www\BLOG_MVC\assets\images\posts/" . $tmpname);
                    } elseif ($tipo == 'image/png') {
                        $origi = imagecreatefrompng("C:\wamp64\www\BLOG_MVC\assets\images\posts/" . $tmpname);
                    }
                    
                    imagecopyresampled($img, $origi, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

                    imagejpeg($img, "C:\wamp64\www\BLOG_MVC\assets\images\posts/" . $tmpname, 80);

                    $sql = $this->db->prepare("INSERT INTO posts_images SET id_post = :id_post, url = :url");
                    $sql->bindValue(":id_post", $id_iserted);
                    $sql->bindValue(":url", $tmpname);
                    $sql->execute();

                }
            }
        }

    }

    public function editPost($id, $titulo, $subtitulo, $description, $foto) {

        $sql = $this->db->prepare(
            "UPDATE posts SET 
                post_title = :titulo,
                post_subtitle = :subtitulo,
                post_description = :description,
                id_user = :id_user,
                id = :id WHERE id = :id");
        $sql->bindValue(":titulo", $titulo);
        $sql->bindValue(":subtitulo", $subtitulo);
        $sql->bindValue(":description", $description);
        $sql->bindValue(":id_user", $_SESSION['idAdmin']);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if (count($foto) > 0) {
            for ($q = 0; $q < count($foto['tmp_name']); $q++) {
                $tipo = $foto['type'][$q];
                if (in_array($tipo, array('image/jpeg', 'image/png'))) {
                    $tmpname = md5(time().rand(0,9999)).'.jpg';

                    move_uploaded_file($foto['tmp_name'][$q], "C:\wamp64\www\BLOG_MVC\assets\images\posts/" . $tmpname);

                    list($width_orig, $height_orig) = getimagesize("C:\wamp64\www\BLOG_MVC\assets\images\posts/" . $tmpname);
                    $ratio = $width_orig / $height_orig;

                    $width = 500;
                    $height = 500;

                    if ($width/$height > $ratio) {
                        $width = $height * $ratio;
                    } else {
                        $height = $width/$ratio;
                    }

                    $img = imagecreatetruecolor($width, $height);
                    if ($tipo == 'image/jpeg') {
                        $origi = imagecreatefromjpeg("C:\wamp64\www\BLOG_MVC\assets\images\posts/" . $tmpname);
                    } elseif ($tipo == 'image/png') {
                        $origi = imagecreatefrompng("C:\wamp64\www\BLOG_MVC\assets\images\posts/" . $tmpname);
                    }
                    
                    imagecopyresampled($img, $origi, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

                    imagejpeg($img, "C:\wamp64\www\BLOG_MVC\assets\images\posts/" . $tmpname, 80);

                    $sql = $this->db->prepare("UPDATE posts_images SET url = :url WHERE id_post = :id_post");
                    $sql->bindValue(":id_post", $id);
                    $sql->bindValue(":url", $tmpname);
                    $sql->execute();

                }
            }
        }

    }

    public function excluirPost($id) {

        $sql = $this->db->prepare("DELETE FROM posts_images WHERE id_post = :id_post");
        $sql->bindValue(":id_post", $id);
        $sql->execute();

        $sql = $this->db->prepare("DELETE FROM posts WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

    }

    public function getTotalPosts() {

        $sql = $this->db->prepare("SELECT COUNT(*) as c FROM posts");
    
        $sql->execute();

        $row = $sql->fetch();

        return $row["c"];
    
    }

}