<?php $title='Mon blog' ?>
<?php ob_start();?>
<header>
    <a href="index.php?action=signMeIn">Sign in</a>
    <a href="index.php?action=logMeIn">Log in</a>
</header>       
<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>
 

<?php
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
        <em><a href="index.php?action=getAPost&amp;id=<?=$data['id']?>">Commentaires</a></em>
    </p>
        </div>
<?php
}
$posts->closeCursor();
?>

<?php $content = ob_get_clean();

require 'template.php';
?>
