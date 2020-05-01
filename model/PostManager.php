<?php

require_once('model/Manager.php');
class PostManager extends Manager{


    public function getPosts(){

        $db = $this->dbConnexion();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(publication_date, \'%d/%m/%Y à %Hh%i\') AS publication_date FROM articles ORDER BY id DESC');

        return $req;
    }

    public function getPost($postId){

        $db = $this->dbConnexion();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(publication_date, \'%d/%m/%Y à %Hh%i\') AS publication_date from articles WHERE id=?');
        $req->execute(array($postId));
        $post = $req->fetch();
        
        return $post;
    }

    public function publishPost($article, $title){

        $db = $this->dbConnexion();
        $req = $db->prepare('INSERT INTO articles (publication_date, content, title) VALUES (NOW(), ?, ?)');
        $req->execute(array($article, $title));

    }

    public function update($postId){

        $db = $this->dbConnexion();
        $req = $db->prepare('SELECT publication_date, content, title FROM articles WHERE id = ?');
        $req->execute(array($postId));

    }

    public function updatePost($article, $title, $postId){

        $db = $this->dbConnexion();
        $req = $db->prepare('UPDATE articles SET publication_date = NOW(), content = ?, title = ? WHERE id = ?');
        $req->execute(array($article, $title, $postId));

    }

    public function deletePost($postId){

        $db = $this->dbConnexion();
        $req = $db->prepare('DELETE FROM articles WHERE id=?');
        $req->execute(array($postId));
        

    }
}