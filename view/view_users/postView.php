
<?php $title = ($post['title']);
ob_start();
if (isset($_SESSION['statut'])){
    if($_SESSION['statut'] == 1){
        ob_start();
        ?>
            <div class="news">
                <h3>
                    <?= ($post['title']) ?>
                    <em>le <?= $post['publication_date'] ?></em>
                </h3>
                
                <p>
                    <?= nl2br(($post['content'])) ?>
                </p>
            </div>

            <h2>Commentaires</h2>
            <form action="index.php?action=addComment&amp;id=<?=$post['id']?>" 
            method = "post">
                <textarea name="commentaire" id="text_area_commentaire" cols="30" rows="10">Votre commentaire</textarea><br>
                <input type="submit"/>
            
            </form>
            <?php
            while ($comment = $commentaires->fetch())
            {
            ?>
                <p><strong><?= ($comment['pseudo']) ?></strong> le <?= $comment['comment_date'] ?></p>
                <p><?= nl2br(($comment['comment'])) ?></p>
                <a class="Btn_link" href="index.php?action=signalComment&amp;id=<?=$comment['id']?>"><button class="btn btn-info">Signaler le commentaire</button></a>
            <?php
            }
            ?>
                
        <?php $content = ob_get_clean();
    } else if ($_SESSION['statut'] == 2) {
        ob_start();
        ?>
            <div class="news">
                <h3>
                    <?= ($post['title']) ?>
                    <em>le <?= $post['publication_date'] ?></em>
                </h3>
                
                <p>
                    <?= nl2br(($post['content'])) ?>
                </p>
            </div>
            <?php
            while ($comment = $commentaires->fetch())
            {
            ?>
                <p><strong><?= ($comment['pseudo']) ?></strong> le <?= $comment['comment_date'] ?></p>
                <p><?= nl2br(($comment['comment'])) ?></p>
                <a class="Btn_link" href="index.php?action=deleteComment&amp;id=<?=$comment['id']?>"><button class="btn btn-info">Supprimer le commentaire</button></a>

            <?php
            }
            ?>
                
        <?php $content = ob_get_clean();
    }
} else {
    ob_start();
    ?>
        <div class="news">
            <h3>
                <?= ($post['title']) ?>
                <em>le <?= $post['publication_date'] ?></em>
            </h3>
            
            <p>
                <?= nl2br(($post['content'])) ?>
            </p>
        </div>
        <?php
        while ($comment = $commentaires->fetch())
        {
        ?>
            <p><strong><?= ($comment['pseudo']) ?></strong> le <?= $comment['comment_date'] ?></p>
            <p><?= nl2br(($comment['comment'])) ?></p>
            

        <?php
        }
    $content = ob_get_clean();    
    
}
require 'template.php';
?>