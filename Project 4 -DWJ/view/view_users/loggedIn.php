<?php session_start();
$_SESSION['pseudo_user']  = $_POST['Pseudo'];
$_SESSION['statut'] = $user_statut;
?>
<?php $title="Billets pour l'Alaska" ?>
<?php ob_start();?>
<header>
    <h1><?= $_SESSION['pseudo_user'] . " possède le statut " . $_SESSION['statut'] ?></h1>
    <a href="index.php">Log out</a>
</header>       

<?php $content = ob_get_clean();

require 'template.php';
?>
