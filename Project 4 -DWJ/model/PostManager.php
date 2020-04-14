<?php

require_once('model/Manager.php');
class PostManager extends Manager{


    public function getPosts(){

        $db = $this->dbConnexion();
        $req = $db->query('SELECT id, title, content, publication_date FROM articles ORDER BY publication_date DESC');

        return $req;
    }

    public function getPost($postId){

        $db = $this->dbConnexion();
        $req = $db->prepare('SELECT * from articles WHERE id=?');
        $req->execute(array($postId));
        $post = $req->fetch();
        
        return $post;
    }

    public function publishPost($article, $title){

        $db = $this->dbConnexion();
        $req = $db->prepare('INSERT INTO articles (publication_date, content, title) VALUES (NOW(), ?, ?)');
        $req->execute(array($article, $title));

    }

    public function deletePost($postId){

        $db = $this->dbConnexion();
        $req = $db->prepare('DELETE FROM articles WHERE id=?');
        $req->execute(array($postId));

    }
}