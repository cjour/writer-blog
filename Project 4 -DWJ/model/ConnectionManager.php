<?php
require_once('model/Manager.php');
class ConnectionManager extends Manager {

    public function LogIn($Pseudo, $Password){

        $db = $this->dbConnexion();
        $req = $db->prepare('SELECT pseudo, password FROM users_login WHERE pseudo = ?');
        $req->execute(array($Pseudo));
        $passwordVerify = $req->fetch();
        if (password_verify($Password, $passwordVerify['password'])){
    
            return true;
    
        } else {
    
            throw new Exception ("Utilisateur non trouvé dans la base de données");
    
        }
        
    }
    
    public function verifyMySignIn($Pseudo){

        $db = $this->dbConnexion();
        $req = $db->prepare('SELECT pseudo FROM users_login WHERE pseudo = ?');
        $req->execute(array($Pseudo));
        $returnedArrayOfPseudo = $req->fetchAll();
        /*fetchAll() retourne un tableau avec un résultat si le Pseudo
        est déjà présent dans la table users_login de la BDD forteroche.
        Sinon il retourne un tableau vide.
        */
        return $returnedArrayOfPseudo;
    }

    public function SignMeIn($Pseudo, $Email, $Password, $PasswordConfirm){

        $req = $this->verifyMySignIn($Pseudo);
        if (count($req) === 0){
 
            $db = $this->dbConnexion();
            $req = $db->prepare('INSERT INTO users_login (pseudo, email, password, sign_in_date, id_statut) VALUES (?, ?, ?, NOW(), 1)');
            $req->execute(array($Pseudo, $Email, password_hash($Password, PASSWORD_DEFAULT)));
  
        } else {

            throw new Exception("Pseudo déjà utilisé. Veuillez choisir un Pseudo différent.");

        }
    }

    public function verifyMyStatut($Pseudo){

        $db = $this->dbConnexion();
        $req = $db->prepare('SELECT id_statut FROM users_login WHERE pseudo = ?');
        $req->execute(array($Pseudo));
        $statut = $req->fetch(PDO::FETCH_ASSOC);
        return (intval($statut['id_statut']));

    }
}
