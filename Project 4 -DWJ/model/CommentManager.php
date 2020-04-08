<?php
require_once('model/Manager.php');
class CommentManager extends Manager{


    public function getComments($postId){

        $db = $this->dbConnexion();
        $commentaires = $db->prepare('SELECT comment, comments_date from comments WHERE id_post = ? ORDER BY comments_date DESC');
        $commentaires->execute(array($postId));
    
        return $commentaires;
    }
    
    public function postAComment($postId, $auteur, $commentaire){
    
        $db = $this->dbConnexion();
        $req = $db->prepare('INSERT INTO comments(id_post, id_user, comment, comments_date) VALUES(?, ?, ?, NOW())');//id user faut faire une jointure de table.
        $affectedLines = $req->execute(array($postId, $auteur, $commentaire));
        return $affectedLines;
    
    }

}