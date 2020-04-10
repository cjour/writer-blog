
<?php $title = htmlspecialchars($post['title']) ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <h1>Billet pour l'Alaska</h1>
        <button class="btn btn-info"><a class="Btn_link" href="index.php?action=signMeIn">Sign in</a></button>
        <button class="btn btn-info"><a class="Btn_link" href="index.php?action=logMeIn">Log in</a></button>
    </nav>
<?php $header = ob_get_clean();
ob_start();
?>
    <p><a href="index.php">Retour à la liste des billets</a></p>

    <div class="news">
        <h3>
            <?= htmlspecialchars($post['title']) ?>
            <em>le <?= $post['publication_date'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($post['content'])) ?>
        </p>
    </div>

    <h2>Commentaires</h2>
    <form action="index.php?action=addComment&amp;id=<?=$post['id']?>" 
    method = "post">
        <input type="text" name="auteur" placeholder="Pseudo"/><br>
        <input type="text" name="commentaire" placeholder="Votre commentaire"/><br>
        <input type="submit"/>
    
    </form>
    <?php
    while ($comment = $commentaires->fetch())
    {
    ?>
        <p><strong><?= htmlspecialchars($comment['auteur']) ?></strong> le <?= $comment['date_commentaire'] ?></p>
        <p><?= nl2br(htmlspecialchars($comment['commentaire'])) ?></p>
    <?php
    }
    ?>
        
<?php $content = ob_get_clean();
require 'template.php';
?>