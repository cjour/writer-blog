<?php ob_start();
if (isset($_SESSION['statut'])){
    if(!empty($_SESSION['statut'])){
        if($_SESSION['statut'] === 1){
            $title = "Billet simple pour l'Alaska.";
            ?> 
            
            <?= "Bienvenue " . $_SESSION['pseudo']?>

            <?php $header_h1 = ob_get_clean(); ?>

            <a href="index.php?action=logout"><button type="button" class="btn btn-info mr-4">Logout</button></a>

            <?php 
            $header_btn = ob_get_clean(); 
            ob_start();
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
                    <button class="btn btn-info"><a class="Btn_link" href="index.php?action=getAPost&amp;id=<?=$data['id']?>">Lire ce billet</a></button>
                </p>
            </div>

            <?php
            }
            $posts->closeCursor();
            $content = ob_get_clean(); 
            ?>


        <?php } else if ($_SESSION['statut'] === 2) { 
            $title="Dashboard " . $_SESSION['pseudo']
            ?>

                <a class="navbar-brand" href="#">Dashboard <?= $_SESSION['pseudo'] ?> </a>
                
            <?php $header_h1 = ob_get_clean(); ?>
                
                <a href="index.php?action=writeAPost"><button type="button" class="btn btn-info mr-4">Nouvel article</button></a>
                <a href="index.php?action=moderateComments"><button type="button" class="btn btn-info mr-4">Modérer les commentaires</button></a>
                <a href="index.php?action=logout"><button type="button" class="btn btn-info mr-4">Logout</button></a>

            <?php
            $header_btn = ob_get_clean();
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
                            <button class="btn btn-info"><a class="Btn_link" href="index.php?action=getAPost&amp;id=<?=$data['id']?>">Lire ce billet</a></button>
                            <button class="btn btn-info"><a class="Btn_link" href="index.php?action=update&amp;id=<?=$data['id']?>">Modifier le billet</a></button>
                            <button class="btn btn-info"><a class="Btn_link" href="index.php?action=deleteAPost&amp;id=<?=$data['id']?>">Supprimer le billet</a></button>
                        
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
    $title = "Billet simple pour l'Alaska."
    ?>

       <?= 'Billet simple pour l\'Alaska' ?>
    <?php $header_h1 = ob_get_clean();?>
            
        <a class="Btn_link" href="index.php?action=signMeIn"><button class="btn btn-info">Sign in</button></a>
        <a class="Btn_link" href="index.php?action=logMeIn"><button class="btn btn-info">Log in</button></a>

        
    <?php $header_btn = ob_get_clean();
    ob_start();

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
                    <button class="btn btn-info"><a class="Btn_link" href="index.php?action=getAPost&amp;id=<?=$data['id']?>">Lire ce billet</a></button>

                    
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
