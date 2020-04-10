<?php $title="Billet pour l'Alaska" ?>

<?php ob_start();?>
Billet pour l'Alaska      
    
<?php $header_h1 = ob_get_clean(); ?>

<button class="btn btn-info"><a class="Btn_link" href="index.php?action=signMeIn">Sign in</a></button>
<button class="btn btn-info"><a class="Btn_link" href="index.php?action=logMeIn">Log in</a></button>

<?php $header_btn = ob_get_clean(); ?>
        
<?php
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
                <button class="btn btn-info"><a class="Btn_link" href="index.php?action=getAPost&amp;id=<?=$data['id']?>">Commentaires</a></button>
            </p>
        </div>
<?php
}
$posts->closeCursor();
?>

<?php $content = ob_get_clean();

require 'template.php';
?>
