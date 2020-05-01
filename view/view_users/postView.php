<?php $title = ($post['title']);
if (isset($_SESSION['statut'])){
    if($_SESSION['statut'] == 1){
        ob_start();
        ?>
        <section class="container-fluid">
            <div class="row d-flex flex-column align-items-center">
                <div class="news col-lg-6 md-6 sm-6 p-4 mb-4">
                    <h2>
                        <?= ($post['title']) ?><br>
                        <em><i class="fas fa-calendar-alt mr-2"></i><?= "le " . $post['publication_date'] ?></em>
                    </h2><br>
                    
                    <p>
                        <?= nl2br(($post['content'])) ?>
                    </p>
                </div>
            </div>
            <div class="row d-flex flex-column align-items-center">
                <div class="comment_encart col-lg-6 md-6 sm-6 p-4 mb-4">
                    <h3><i class="fas fa-comment mr-4"></i>Commentaires</h3>
                    <form action="index.php?action=addComment&amp;id=<?=$post['id']?>" 
                    method = "post">
                        
                        <textarea class="col-12" name="commentaire" id="text_area_commentaire" rows="1"></textarea><br><br>
                        <button type="submit" class="btn btn-info">Publier</button>
                    
                    </form>
                </div>
            <?php
            while ($comment = $commentaires->fetch())
            {
            ?>  
                <div class="comment_encart col-lg-6 md-6 sm-6 p-4 mb-4">
                    <p class="d-flex justify-content-between"><strong><i class="fas fa-user mr-2"></i><?= ($comment['pseudo']) ?></strong> <?= $comment['comment_date'] ?></p>
                    <p><?= nl2br(($comment['comment'])) ?></p>
                    <a class="Btn_link" href="index.php?action=signalComment&amp;id=<?=$comment['id']?>&amp;idpost=<?=$post['id']?>"><button class="btn btn-info">Signaler le commentaire</button></a>
                </div>
            <?php
            }
            ?>
            </div>
        </section>        
        <?php $content = ob_get_clean();
    } else if ($_SESSION['statut'] == 2) {
        ob_start();
        ?>
        <section class="container-fluid">
            <div class="row d-flex flex-column align-items-center">
                <div class="news col-lg-6 md-6 sm-6 p-4 mb-4">
                    <h2>
                        <?= ($post['title']) ?><br>
                        <em><i class="fas fa-calendar-alt mr-2"></i><?= "le " . $post['publication_date'] ?></em>
                    </h2><br>
                    
                    <p>
                        <?= nl2br(($post['content'])) ?>
                    </p>
                </div>
            </div>
            <section class="row d-flex flex-column align-items-center">
            <?php
            while ($comment = $commentaires->fetch())
            {
            ?>
            <div class="comment_encart col-lg-6 md-6 sm-6 p-4 mb-4">
                <p class="d-flex justify-content-between"><strong><i class="fas fa-user mr-2"></i><?= ($comment['pseudo']) ?></strong> <?= $comment['comment_date'] ?></p>
                <p><?= nl2br(($comment['comment'])) ?></p>
                <a class="Btn_link" href="index.php?action=deleteComment&amp;idComment=<?=$comment['id']?>&amp;idPost=<?=$post['id']?>"><button class="btn btn-info">Supprimer le commentaire</button></a>
            </div>
             
            <?php
            }
            ?>
            </section>
        </section>        
        <?php $content = ob_get_clean();
    }
} else {
    ob_start();
    ?>
    <section class="container-fluid">
        <div class="row d-flex flex-column align-items-center">
            <div class="news col-lg-6 md-6 sm-6 p-4 mb-4">
                <h2>
                    <?= ($post['title']) ?><br>
                    <em><i class="fas fa-calendar-alt mr-2"></i><?= "le " . $post['publication_date'] ?></em>
                </h2><br><br>
                
                <p>
                    <?= nl2br(($post['content'])) ?>
                </p>
            </div>
        </div>
        <section class="row d-flex flex-column align-items-center">
        <?php while ($comment = $commentaires->fetch()) { ?>
            <div class="comment_encart col-lg-6 md-6 sm-6 p-4 mb-4">
                <p class="d-flex justify-content-between"><strong><i class="fas fa-user mr-2"></i><?= ($comment['pseudo']) ?></strong> <?= $comment['comment_date'] ?></p>
                <p><?= nl2br(($comment['comment'])) ?></p>
            </div>
            <?php
            }
            ?>
            </div>
        </section>
    </section>
        <?php

    $content = ob_get_clean();    
}
require 'template.php';
?>