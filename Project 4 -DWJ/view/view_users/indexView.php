<?php ob_start();
    if($_SESSION['statut'] === 1){
?>    
   <?= "Bienvenue " . $_SESSION['pseudo']?>

<?php $header_h1 = ob_get_clean(); ?>

<a href="index.php">Log out</a>

<?php 
$header_btn = ob_get_clean(); 
ob_start();
while ($data = $posts->fetch())
{
?>

<div class="news">
    <h3>
        <?= htmlspecialchars($data['title']) ?>
        <em>le <?= $data['publication_date'] ?></em>
    </h3>

    <p>
        <?= nl2br(htmlspecialchars($data['content'])) ?>
        <br />
        <button class="btn btn-info"><a class="Btn_link" href="index.php?action=getAPost&amp;id=<?=$data['id']?>">Ecrire un commentaire</a></button>
    </p>
</div>

<?php
}
$posts->closeCursor();
$content = ob_get_clean(); 
?>


<?php } else if ($_SESSION['statut'] === 2) { ?>

    <a class="navbar-brand" href="#">Dashboard <?= $_SESSION['pseudo'] ?> </a>
    
<?php $header_h1 = ob_get_clean(); ?>

    <a href="index.php"><button type="button" class="btn btn-info mr-4">Logout</button></a>

<?php
$header_btn = ob_get_clean();
ob_start();
?>

<a href="index.php?action=writeAPost">Ecrire un article.</a><br>
<?php while ($data = $posts->fetch())
    {
?>
        <div class="news">
            <h3>
                <?= htmlspecialchars($data['title']) ?>
                <em>le <?= $data['publication_date'] ?></em>
            </h3>

            <p>
                <?= nl2br(htmlspecialchars($data['content'])) ?>
                <br />
                <button class="btn btn-info"><a class="Btn_link" href="index.php?action=updateAPost&amp;id=<?=$data['id']?>">Modifier le billet</a></button>
                <button class="btn btn-info"><a class="Btn_link" href="index.php?action=deleteAPost&amp;id=<?=$data['id']?>">Supprimer le billet</a></button>
            </p>
        </div>
<?php
}
$posts->closeCursor();
?>

<?php $content = ob_get_clean(); 
require 'template.php';
} else {?>

    Billet pour l'Alaska
<?php $header_h1 = ob_get_clean();?>
        
    <a class="Btn_link" href="index.php?action=signMeIn"><button class="btn btn-info">Sign in</button></a>
    <a class="Btn_link" href="index.php?action=logMeIn"><button class="btn btn-info">Log in</button></a>

    
<?php $header_btn = ob_get_clean();
ob_start();

    while ($data = $posts->fetch())
    {
?>
        <div class="news">
            <h3>
                <?= htmlspecialchars($data['title']) ?>
                <em>le <?= $data['publication_date'] ?></em>
            </h3>

            <p>
                <?= nl2br(htmlspecialchars($data['content'])) ?>
                <br />
                
            </p>
        </div>
<?php
}
$posts->closeCursor();
?>

<?php $content = ob_get_clean();
}
require 'template.php';
?>
