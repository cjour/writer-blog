<?php 
$title = "Your recent publication";
ob_start();?>

    <h1>Vos publications récentes.</h1>
        
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
        <a href="index.php?action=verifyMyLogin/admin/update&amp;id=<?=$data['id']?>"><button>Modifier</button></a>
        <em><a href="index.php?action=getAPost&amp;id=<?=$data['id']?>">Commentaires</a></em>
    </p>
        </div>
<?php
}
$posts->closeCursor();
$content = ob_get_clean();
require 'template.php';
?>    