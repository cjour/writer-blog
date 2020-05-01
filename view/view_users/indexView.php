<?php $title = "Billet simple pour l'Alaska.";
if (isset($_SESSION['statut'])){
    if(!empty($_SESSION['statut'])){
        if($_SESSION['statut'] === 1){
        ob_start();
?>
        <section class="container-fluid mt-15 "> 
        <div class="row justify-content-around">
        <?php while ($data = $posts->fetch()) {?>

            <div class="encart col-lg-3 col-md-4 col-sm-12">
                <h2>
                    <?= ($data['title']) ?><br>
                    <em><i class="fas fa-calendar-alt mr-2"></i><?= "le " . $data['publication_date'] ?></em>
                </h2><br>
                <p>
                    <?= nl2br(substr($data['content'], 0, 444)). "..."  ?>
                    <br><br>
                    
                    <a class="Btn_link" href="index.php?action=getAPost&amp;id=<?=$data['id']?>"><button class="btn btn-info"><i class="fas fa-eye mr-2"></i>Lire la suite</button></a>
                </p>
            </div>
        

            <?php }
            $posts->closeCursor();
            ?>
            </div>
            </section>
            
            <?php $content = ob_get_clean(); ?>
        

        <?php } else if ($_SESSION['statut'] === 2) {
        ?>
             <section class="container-fluid mt-15"> 
            <div class="row justify-content-around">    
            <?php while ($data = $posts->fetch())
                {
            ?>
                    <div class="encart col-lg-6 col-md-12 col-sm-12">
                        <h2>
                            <?= ($data['title']) ?><br>
                            <em><i class="fas fa-calendar-alt mr-2"></i><?= "le " . $data['publication_date'] ?></em>
                        </h2><br>

                        <p>
                            <?= nl2br(substr($data['content'], 0, 444)). "..."  ?>
                            <br><br>
                            <a class="Btn_link" href="index.php?action=getAPost&amp;id=<?=$data['id']?>"><button class="btn btn-info mb-2"><i class="fas fa-eye mr-2"></i>Lire la suite</button></a>
                            <a class="Btn_link" href="index.php?action=update&amp;id=<?=$data['id']?>"><button class="btn btn-info mb-2"><i class="fas fa-pencil-alt mr-2"></i>Modifier le billet</button></a>
                            <a class="Btn_link" href="index.php?action=deleteAPost&amp;id=<?=$data['id']?>"><button class="btn btn-info mb-2"><i class="fas fa-trash mr-2"></i>Supprimer le billet</button></a>                      
                        </p>
                    </div>
            <?php
            } 
            $posts->closeCursor();
            ?>
            </div>
            </section>
            <?php    
            $content = ob_get_clean(); ?>
            <?php
        }
    }
} else {

    ob_start();
    $title = "Billet simple pour l'Alaska.";
    ?>
    <section class="container-fluid mt-15"> 
        <div class="row justify-content-around">
        <?php while ($data = $posts->fetch()) {?>

            <div class="encart col-lg-3 col-md-6 col-sm-12">
                <h2>
                    <?= ($data['title']) ?><br>
                    <em><i class="fas fa-calendar-alt mr-2"></i><?= "le " . $data['publication_date'] ?></em>
                </h2><br>
                <p>
                    <?= nl2br(substr($data['content'], 0, 300)) . "..." ?>
                    <br><br>
                    <a class="Btn_link" href="index.php?action=getAPost&amp;id=<?=$data['id']?>"><button class="btn btn-info"><i class="fas fa-eye mr-2"></i>Lire la suite</button></a>
                </p>
            </div>
        

            <?php }
            $posts->closeCursor();
            ?>
            </div>
            </section>
    <?php $content = ob_get_clean();
}
require 'template.php';
?>