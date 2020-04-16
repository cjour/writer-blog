<?php ob_start();
$title = "Billet simple pour l'Alaska.";
if (isset($_SESSION['statut'])){
    if(!empty($_SESSION['statut'])){
        if($_SESSION['statut'] === 1){
            while ($data = $posts->fetch())
            {
            ?>

            <div class="news">
                <h3>
                    <?= ($data['title']) ?>
                    <em>le <?= $data['publication_date'] ?></em>
                </h3>

                <p>
                    <?= nl2br(($data['content'])) ?>
                    <br />
                    <a class="Btn_link" href="index.php?action=getAPost&amp;id=<?=$data['id']?>"><button class="btn btn-info">Lire ce billet</button></a>
                </p>
            </div>

            <?php
            }
            $posts->closeCursor();
            $content = ob_get_clean(); 
            ?>


        <?php } else if ($_SESSION['statut'] === 2) { 
            ob_start();
            ?>

            <?php while ($data = $posts->fetch())
                {
            ?>
                    <div class="news">
                        <h3>
                            <?= ($data['title']) ?>
                            <em>le <?= $data['publication_date'] ?></em>
                        </h3>

                        <p>
                            <?= nl2br(($data['content'])) ?>
                            <br />
                            <a class="Btn_link" href="index.php?action=getAPost&amp;id=<?=$data['id']?>"><button class="btn btn-info">Lire ce billet</button></a>
                            <a class="Btn_link" href="index.php?action=update&amp;id=<?=$data['id']?>"><button class="btn btn-info">Modifier le billet</button></a>
                            <a class="Btn_link" href="index.php?action=deleteAPost&amp;id=<?=$data['id']?>"><button class="btn btn-info">Supprimer le billet</button></a>                      
                        </p>
                    </div>
            <?php
            }
            
            $posts->closeCursor();
            ?>

            <?php $content = ob_get_clean(); 
        }
    }
} else {

    ob_start();
    $title = "Billet simple pour l'Alaska.";

        while ($data = $posts->fetch())
        {
    ?>
            <div class="news">
                <h3>
                    <?= ($data['title']) ?>
                    <em>le <?= $data['publication_date'] ?></em>
                </h3>

                <p>
                    <?= nl2br(($data['content'])) ?>
                    <br />
                    <a class="Btn_link" href="index.php?action=getAPost&amp;id=<?=$data['id']?>"><button class="btn btn-info">Lire ce billet</button></a>

                    
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
