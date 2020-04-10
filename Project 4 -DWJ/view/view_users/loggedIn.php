<?php $title="Billets pour l'Alaska" ?>

<?php ob_start();
    if($_SESSION['statut'] === 1){
?>    
   <?= $_SESSION['pseudo'] . " possède le statut " . $_SESSION['statut'] ?>

<?php $header_h1 = ob_get_clean(); ?>

<a href="index.php">Log out</a>

<?php 
$header_btn = ob_get_clean(); 
ob_start();
?>
        <p>Vous pouvez maintenant publier des commentaires sur les articles de Jean Forteroche</p>
<?php $content = ob_get_clean(); 
require 'template.php';
?>


<?php } else if ($_SESSION['statut'] === 2) { ?>

    <a class="navbar-brand" href="#">Dashboard <?= $_SESSION['pseudo'] ?> </a>
    
<?php $header_h1 = ob_get_clean(); ?>

    <a href="index.php"><button type="button" class="btn btn-info mr-4">Logout</button></a>

<?php
$header_btn = ob_get_clean();
ob_start();
?>

<a href="index.php?action=verifyMyLogin/admin/write">Ecrire un article.</a><br>
<a href="index.php?action=verifyMyLogin/admin/read">Lire un article.</a><br>
<a href="index.php?action=verifyMyLogin/admin/update">Modifier un article.</a><br>
<a href="index.php?action=verifyMyLogin/admin/delete">Supprimer un article.</a><br>

<?php $content = ob_get_clean(); 
require 'template.php';
}
?>