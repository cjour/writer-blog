<?php
$title = "Interface d'administration des billets";
ob_start();
?>
    <a class="navbar-brand" href="#">Dashboard <?= $_SESSION['pseudo'] ?> </a>       
    
<?php $header_h1 = ob_get_clean(); ?>

    <a href="index.php"><button type="button" class="btn btn-info mr-4">Logout</button></a>

<?php
$header_btn = ob_get_clean();
ob_start();
?>


    <form action="index.php?action=verifyMyLogin/admin/write/publish" method="post">
        <input name="Title" type="text" id="title">
        <textarea name="Article" id="textarea" cols="30" rows="10"></textarea>
        <input type="submit" value="Publier">
    </form>
<?php
    $content = ob_get_clean();
    require 'template.php';
?>    