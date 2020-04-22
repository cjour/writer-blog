<?php
session_start();
require 'controller/frontend.php'; 
try {
    
    if (isset($_GET['action'])){
        if ($_GET['action'] == 'signMeIn') {

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
                        $PseudoResult = verifyPseudoAvailability($Pseudo);
                        if ($PseudoResult === 0){
                            
                            signIn($Pseudo, $Email, $Password, $PasswordConfirm);

                        } else {

                            throw new Exception ("Pseudo déjà utilisé");
                        }
                        
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
                        $correctLog = verifyMyPassword($Pseudo, $Password);
                        if ($correctLog === true){

                            logIn($Pseudo, $Password);

                        } else {

                            throw new Exception("Votre login ou mot de passe est faux. ");
                        }

                } else {
     
                    throw new Exception ("Vous n'avez pas rempli l'un des champs correctement.");
    
                }
  
            } else {   
                
                throw new Exception ("Vous n'avez pas rempli les champs correctement.");
            }
                    
        } else if ($_GET['action'] == 'logout') {
            logout();
        } elseif ($_GET['action'] == 'getAPost'){
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                getAPost();
            } else {

                throw new Exception ("Pas de post correspondant");
            }
        } elseif ($_GET['action'] == 'listMyPosts') {
    
            listMyPosts();
            
        } elseif (isset($_SESSION['statut'])){
            if(!empty($_SESSION['statut'])) {
                if($_SESSION['statut'] === 1) {
                    if(isset($_GET['action'])){
                        //loggedIn normal users fonctionnality
                        if ($_GET['action'] == 'addComment') {
                                
                            if (isset($_GET['id']) && $_GET['id'] > 0){
                
                                if(!empty($_POST['commentaire'])){
                                    $postId = $_GET['id'];
                                    $id_auteur = $_SESSION['id'];
                                    $commentaires = $_POST['commentaire'];
                                    addAComment($postId, $id_auteur, $commentaires);   
                
                                } else {
                
                                    throw new Exception ("impossible d'ajouter votre commentaire, vous n'avez pas renseigné de Pseudo et/ou de commentaire");
                                    
                                }
                            }
                        } else if ($_GET['action'] == 'signalComment') {
                                
                            if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['idpost']) && $_GET['idpost'] > 0){
            
                                $commentId = $_GET['id'];
                                $postId = $_GET['idpost'];
                                signalComment($commentId, $postId);
    
                            } else {
    
                                throw new Exception ("Aucun identifiant de commentaire envoyé.");
                            }
                        }
                    } else {
                        listMyPosts();
                    } //loggedIn admin users fonctionnality
                } else if ($_SESSION['statut'] === 2){
                    if(isset($_GET['action'])){
                        if ($_GET['action'] == 'writeAPost'){  
                            write();   
                        } else if ($_GET['action'] == 'publishAPost'){ 
                            $article = $_POST['Article'];
                            $title = $_POST['Title'];
                            publish($article, $title);   
                        } else if ($_GET['action'] == 'update'){
                            if (isset($_GET['id']) && $_GET['id'] > 0){
                                $postId = $_GET['id'];
                                update($postId);
                            }
                        } else if ($_GET['action'] == 'updatePost'){
                            if (isset($_GET['id']) && $_GET['id'] > 0){
                                $postId = $_GET['id'];
                                if (!empty($_POST['Article']) && !empty($_POST['Title'])){
                                $article = $_POST['Article'];
                                $title = $_POST['Title'];
                                updatePost($article, $title, $postId);
                                } else {
                                    throw new Exception ("oups vous avez oublié de remplir le titre ou le contenu");
                                }
                            } else {
                
                                throw new Exception ("aucun identifiant de billet envoyé via l'URL");
                            }
                
                            
                        } else if (($_GET['action'] == 'deleteAPost')){
                            if (isset($_GET['id']) && $_GET['id'] > 0){
                                $postId = $_GET['id'];
                                delete($postId);
                
                            } else {
                
                                throw new Exception ("aucun identifiant de billet envoyé via l'URL");
                            }
                        } else if (($_GET['action'] == 'deleteComment')){
                            if (isset($_GET['idComment']) && isset($_GET['idPost']) && $_GET['idComment'] > 0 && $_GET['idPost']){
                                $commentId = $_GET['idComment'];
                                $postId = $_GET['idPost'];
                                deleteComment($commentId, $postId);
                            } else {
                
                                throw new Exception ("aucun identifiant de commentaire envoyé via l'URL");
                            }
                        } else if ($_GET['action'] == 'moderateComments') {
    
                            moderateComments();
                            
                        } else if ($_GET['action'] == 'unsignalComment') {
                            if (isset($_GET['id']) && $_GET['id'] > 0){
                                $commentId = $_GET['id'];
                                unsignalComment($commentId);
                            } else {
                
                                throw new Exception ("aucun identifiant de commentaire envoyé via l'URL");
                            }
                            
                        }
                    } 
                } 
            }
        } else {

        listMyPosts();

        }
    } else {
        listMyPosts();
    }

     
       
} catch(Exception $e) {

    $errorMessage =  "Erreur : " . $e->getMessage();
    require 'view/view_users/errorView.php';
}