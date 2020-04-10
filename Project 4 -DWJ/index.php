<?php
session_start();

require 'controller/frontend.php'; 

try {   

    if (isset($_GET['action'])){

        if ($_GET['action'] == 'listMyPosts') {

            listMyPosts();

        } elseif ($_GET['action'] == 'signMeIn') {

            signMeIn();

        } elseif ($_GET['action'] == 'logMeIn') {

            logMeIn();

        } elseif ($_GET['action'] == 'verifyMySignIn') {
            if(isset($_POST['Pseudo']) && ($_POST['Email']) && ($_POST['Password']) && ($_POST['PasswordConfirm'])) {

                if(!empty($_POST['Pseudo']) && !empty($_POST['Email']) && !empty($_POST['Password']) && !empty($_POST['PasswordConfirm'])){
                    
                    $Pseudo = $_POST['Pseudo'];
                    $Email = $_POST['Email'];
                    $Password = $_POST['Password'];
                    $PasswordConfirm = $_POST['PasswordConfirm'];

                    if($Password === $PasswordConfirm){

                        SignIn($Pseudo, $Email, $Password, $PasswordConfirm);

                    } else {

                        throw new Exception ("La confirmation de votre mot de passe n'est pas correcte");
                    }                    
            
                } else {
     
                    throw new Exception ("Vous n'avez pas rempli tous les champs correctement.");  
                }
  
            } else {   
                
                throw new Exception ("Vous n'avez pas rempli les champs correctement.");
            }
        } elseif ($_GET['action'] == 'verifyMyLogin') {

            if(isset($_POST['Pseudo']) && ($_POST['Password'])) {

                if(!empty($_POST['Pseudo']) && !empty($_POST['Password'])){
                    
                        $Pseudo = $_POST['Pseudo'];
                        $Password = $_POST['Password'];
                        verifyMyLogIn($Pseudo, $Password);

                } else {
     
                    throw new Exception ("Vous n'avez pas rempli l'un des champs correctement.");
    
                }
  
            } else {   
                
                throw new Exception ("Vous n'avez pas rempli les champs correctement.");
            }
                    
        } elseif ($_GET['action'] == 'verifyMyLogin/admin/write') {
            write();
        } elseif ($_GET['action'] == 'verifyMyLogin/admin/write/publish') {
            if(isset($_POST['Article']) && ($_POST['Title'])){
                if(!empty($_POST['Article']) && !empty($_POST['Title'])){

                    $article= $_POST['Article'];
                    $title = $_POST['Title'];
                    publish($article, $title);
                } else {

                    throw new Exception("Vous n'avez pas rempli tous les champs.");
                }
                
            } else {

                throw new Exception("Oups, vous n'avez rien écrit.");
            }
               
        } elseif ($_GET['action'] == 'verifyMyLogin/admin/read') {
            read();
        } elseif ($_GET['action'] == 'verifyMyLogin/admin/update') {
            update();
        } elseif ($_GET['action'] == 'verifyMyLogin/admin/delete') {
            delete();
        } elseif ($_GET['action'] == 'getAPost') {

            if (isset($_GET['id']) && $_GET['id'] > 0){

                getAPost();

            } else {

                throw new Exception ("aucun identifiant de billet envoyé via l'URL");
            }

        } elseif ($_GET['action'] == 'addComment') {//a revoir
            
            if (isset($_GET['id']) && $_GET['id'] > 0){

                if(!empty($_POST['auteur']) && !empty($_POST['commentaire'])){
                    $postId = $_GET['id'];
                    $pseudo = $_POST['auteur'];
                    $commentaires = $_POST['commentaire'];
                    addAComment($postId, $pseudo, $commentaires);   

                } else {

                    throw new Exception ("impossible d'ajouter votre commentaire, vous n'avez pas renseigné de Pseudo et/ou de commentaire");
                    
                }
            }
        } else {
            
            throw new Exception ("aucun identifiant de billet envoyé via l'URL");   
        }

    } else {

        listMyPosts();    
    }

} catch(Exception $e) {

    $errorMessage =  "Erreur : " . $e->getMessage();
    require 'view/view_users/errorView.php';
}