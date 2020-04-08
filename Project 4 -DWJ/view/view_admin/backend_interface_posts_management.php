<?php 
    $title = "Interface d'administration des billets";
    ob_start();
?>

    <form action="index.php?action=verifyMyLogin/admin/write/publish" method="post">
        <label for="textarea"><h1>Laissez votre plume s'exprimer Jean.</h1></label>
        <textarea name="Article" id="textarea" cols="30" rows="10"></textarea>
        <input type="submit" value="Publier">
    </form>
<?php
    $content = ob_get_clean();
    require 'template.php';
?>    