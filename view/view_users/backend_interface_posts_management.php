<?php
$title = "Interface d'administration des billets";
ob_start();
?>
    <a class="navbar-brand" href="#">Dashboard <?= $_SESSION['pseudo'] ?> </a>       
    
<?php $header_h1 = ob_get_clean(); ?>
    <a href="index.php?action=listMyPosts"><button type="button" class="btn btn-info mr-4">Home</button></a>
    <a href="index.php"><button type="button" class="btn btn-info mr-4">Logout</button></a>

<?php
$header_btn = ob_get_clean();
ob_start();
?>
    <form <?php 
        if($_GET['action'] == 'update' ){?>
            action="index.php?action=updatePost&amp;id=<?=$_GET['id']?>" method="post">
<?php } elseif ($_GET['action'] == 'writeAPost') {?>
            action="index.php?action=publishAPost" method="post">      
<?php } ?>
    <label for="title">Votre titre de billet.</label>
    <input name="Title" type="text" id="title" value="<?php if($_GET['action'] == 'update' ){echo $post['title'];}?>">
    <label for="textarea">Votre corps de billet.</label>
    <textarea name="Article" id="textarea" cols="30" rows="10"><?php if($_GET['action'] == 'update' ){echo $post['content'];}?>
    </textarea>
    <input type="submit" value="Publier">
</form>

<?php

$content = ob_get_clean();
require 'template.php';
?>    