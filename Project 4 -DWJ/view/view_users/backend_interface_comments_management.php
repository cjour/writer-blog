<?php session_start();
$_SESSION['pseudo_user']  = $Pseudo;
$_SESSION['statut'] = $user_statut;
$title = "Interface d'administration des billets";
ob_start();
?>
$title = "Interface d'administration des commentaires";
ob_start();?>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow p-3 mb-5 bg-white rounded justify-content-between">
        <a class="navbar-brand" href="#">Dashboard <?= $_SESSION['pseudo_user'] ?> </a>
        <ul class="nav" id="main_nav ">
            <li class="nav-item">
                <a class="main_color nav-link active" href="#"><i class="fas fa-home px-2"></i>Home</a>
            </li>
            <li class="nav-item">
                <a class="main_color nav-link active" href="#"><i class="fab fa-leanpub px-2"></i>Posts</a>
            </li>
            <li class="nav-item">
                <a class="main_color nav-link" href="#"><i class="fas fa-comment px-2"></i></i>Comments</a>
            </li>  
        </ul>
        <a href="index.php"><button type="button" class="btn btn-info mr-4">Logout</button></a>        
    </nav>
</header>
    
<?php $header = ob_get_clean(); ?>
    <h1>Administration des commentaires</h1>
        
<?php
    $content = ob_get_clean();
    require 'template.php';
?>    