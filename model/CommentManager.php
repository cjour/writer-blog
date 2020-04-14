<?php
require_once('model/Manager.php');
class CommentManager extends Manager{


    public function getComments($postId){

        $db = $this->dbConnexion();
        $commentaires = $db->prepare('SELECT comments.id AS id, comments.comment AS comment, comments.comments_date AS comment_date, users_login.pseudo AS pseudo 
        FROM comments
        INNER JOIN users_login 
        ON comments.id_user = users_login.id
        WHERE comments.id_post = ? ORDER BY comments_date DESC');
        $commentaires->execute(array($postId));
    
        return $commentaires;
    }
    
    public function getComment($commentId){

        $db = $this->dbConnexion();
        $commentaire = $db->prepare('SELECT comment, comments_date FROM comments WHERE id = ?');
        $commentaire->execute(array($commentId));
    
        return $commentaire;
    }

    public function deleteComment($commentId){

        $db = $this->dbConnexion();
        $commentaire = $db->prepare('DELETE FROM comments WHERE id = ?');
        $commentaire->execute(array($commentId));
    
    }

    public function postAComment($postId, $id_auteur, $commentaire){
    
        $db = $this->dbConnexion();
        $req = $db->prepare('INSERT INTO comments(id_post, id_user, comment, comments_date, signaled_comments) VALUES(?, ?, ?, NOW(), 0)');//id user faut faire une jointure de table.
        $affectedLines = $req->execute(array($postId, $id_auteur, $commentaire));
        return $affectedLines;
    
    }

}