<?php
$title = "Administration des commentaires";
ob_start();
?>     

<a class="navbar-brand" href="#">Dashboard <?= $_SESSION['pseudo'] ?> </a>
                
<?php $header_h1 = ob_get_clean(); ?>

<a href="index.php?action=writeAPost"><button type="button" class="btn btn-info mr-4">Nouvel article</button></a>
<a href="index.php?action=moderateComments"><button type="button" class="btn btn-info mr-4">Modérer les commentaires</button></a>
<a href="index.php?action=logout"><button type="button" class="btn btn-info mr-4">Logout</button></a>

<?php
$header_btn = ob_get_clean();
ob_start();

     while ($comment = $comments->fetch())
     {
     ?>
         <p><strong><?= ($comment['pseudo']) ?></strong> le <?= $comment['comment_date'] ?></p>
         <p><?= nl2br(($comment['comment'])) ?></p>
         <button class="btn btn-info"><a class="Btn_link" href="index.php?action=deleteComment&amp;id=<?=$comment['id']?>">Supprimer le commentaire</a></button>
     <?php
     }
     $comments -> closeCursor();
     var_dump($comment['id']);
     ?>
    
<?php $content = ob_get_clean();
require ('template.php');
?>