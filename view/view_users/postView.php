
<?php $title = ($post['title']);
ob_start();
if (isset($_SESSION['statut'])){
    if($_SESSION['statut'] == 1){ ?>
        <?= 'Bienvenue ' . $_SESSION['pseudo'] ?>
        <?php $header_h1 = ob_get_clean();?>
            <a href="index.php?action=listMyPosts"><button type="button" class="btn btn-info mr-4">Home</button></a>
            <button class="btn btn-info"><a class="Btn_link" href="index.php?action=logout">Logout</a></button>
        
        <?php $header_btn = ob_get_clean();
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
                <input type="text" name="auteur" placeholder="Pseudo" value="<?= $_SESSION['pseudo'] ?>"/><br>
                <textarea name="commentaire" id="text_area_commentaire" cols="30" rows="10">Votre commentaire</textarea><br>
                <input type="submit"/>
            
            </form>
            <?php
            while ($comment = $commentaires->fetch())
            {
            ?>
                <p><strong><?= ($comment['pseudo']) ?></strong> le <?= $comment['comment_date'] ?></p>
                <p><?= nl2br(($comment['comment'])) ?></p>
            <?php
            }
            ?>
                
        <?php $content = ob_get_clean();
    } else if ($_SESSION['statut'] == 2) {
        ?>
        <?= 'Dashboard' . $_SESSION['pseudo'] ?>
        <?php $header_h1 = ob_get_clean();?>

            <a href="index.php?action=listMyPosts"><button type="button" class="btn btn-info mr-4">Home</button></a> 
            
        
        <?php $header_btn = ob_get_clean();
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
                <button class="btn btn-info"><a class="Btn_link" href="index.php?action=deleteComment&amp;id=<?=$comment['id']?>">Supprimer le commentaire</a></button>

            <?php
            }
            ?>
                
        <?php $content = ob_get_clean();
    }
} else {
    ?>
    <?= 'Billet simple pour l\'Alaska' ?>
    <?php $header_h1 = ob_get_clean();?>

        <a href="index.php?action=listMyPosts"><button type="button" class="btn btn-info mr-4">Home</button></a> 
        <a class="Btn_link" href="index.php?action=signMeIn"><button class="btn btn-info">Sign in</button></a>
        <a class="Btn_link" href="index.php?action=logMeIn"><button class="btn btn-info">Log in</button></a>
    
    <?php $header_btn = ob_get_clean();
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