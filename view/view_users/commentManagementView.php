<?php
$title = "Administration des commentaires";
ob_start();
if(!empty($comments)){
    while ($comment = $comments->fetch())
    {
    ?>
        <p><strong><?= ($comment['pseudo']) ?></strong> le <?= $comment['comment_date'] ?></p>
        <p><?= nl2br(($comment['comment'])) ?></p>
        <a class="Btn_link" href="index.php?action=deleteComment&amp;id=<?=$comment['id']?>"><button class="btn btn-info">Supprimer le commentaire</button></a>
        <a class="Btn_link" href="index.php?action=unsignalComment&amp;id=<?=$comment['id']?>"><button class="btn btn-info">Enlever le signalement</button></a>

    <?php
    }
    $comments -> closeCursor();
    ?>
    
<?php } else { ?>

    <p>Aucun commentaire n'a été signalé.</p>

<?php }
$content = ob_get_clean();
require ('template.php');
?>