<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/ConnectionManager.php');


function signMeIn(){

    require ('view/view_users/sign_in.php');

}

function SignIn($Pseudo, $Email, $Password, $PasswordConfirm){

    $signInManager = new ConnectionManager();
    $signInManager->verifyMySignIn($Pseudo);
    $signInManager->SignMeIn($Pseudo, $Email, $Password, $PasswordConfirm);
    require('view/view_users/login.php');
}

function logMeIn(){

    require ('view/view_users/login.php');
}

function verifyMyLogIn($Pseudo, $Password){

    $connectionManager = new ConnectionManager();
    $_SESSION['pseudo'] = $connectionManager->LogIn($Pseudo, $Password);
    $_SESSION['statut'] = $connectionManager->verifyMyStatut($Pseudo);
    require('view/view_users/loggedIn.php');
}

function listMyPosts(){

    $postManager = new PostManager();
    $posts = $postManager->getPosts();
    require('view/view_users/indexView.php');
}

function getAPost(){

    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $post = $postManager->getPost($_GET['id']);
    $commentaires = $commentManager->getComments($_GET['id']);
    require('view/view_users/postView.php');
}

function addAComment($postId, $auteur, $commentaire){

    $commentManager = new CommentManager();
    $affectedLines = $commentManager->postAComment($postId, $auteur, $commentaire);
    if ($affectedLines === false){
        throw new Exception ("impossible d'ajouter votre commentaire");
        
        
    } else {

        header('Location:index.php?action=getAPost&id='. $postId);
    }
}

function write(){

    require('view\view_users\backend_interface_posts_management.php');
}

function publish($article, $title){

    $postManager = new PostManager();
    $postManager->publishPost($article, $title);
    $posts = $postManager->getPosts();
    require('view/view_users/articleJustPublish.php');
}

function read(){

    $postManager = new PostManager();
    $posts = $postManager->getPosts();
    require('view\view_users\indexView.php');

}

function update(){

    
    require('view\view_admin\backend_interface_posts_management.php');
}

function delete(){

    require('view\view_admin\backend_interface_posts_management.php');
}