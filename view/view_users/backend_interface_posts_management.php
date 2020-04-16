<?php
$title = "Ecriture de billets";
ob_start();
?>
    <form <?php 
        if($_GET['action'] == 'update' ){?>
            action="index.php?action=updatePost&amp;id=<?=$_GET['id']?>" method="post">
<?php } elseif ($_GET['action'] == 'writeAPost') {?>
            action="index.php?action=publishAPost" method="post">      
<?php } ?>
    <label for="title">Votre titre de billet.</label><br><br>
    <input name="Title" type="text" id="title" value="<?php if($_GET['action'] == 'update' ){echo $post['title'];}?>"><br><br>
    <label for="textarea">Votre corps de billet.</label><br><br>
    <textarea name="Article" id="textarea" cols="30" rows="10"><?php if($_GET['action'] == 'update' ){echo $post['content'];}?><br><br>
    </textarea>
    <input type="submit" value="Publier">
</form>

<?php

$content = ob_get_clean();
require 'template.php';
?>    