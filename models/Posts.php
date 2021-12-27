<?php

class Posts extends Model {

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

}