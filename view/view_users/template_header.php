<?php ?>



<?php
if (isset($_SESSION['statut'])){
    if(!empty($_SESSION['statut'])){
        if($_SESSION['statut'] === 1){
        ob_start();
?>            
            <?= "Bienvenue " . $_SESSION['pseudo']?>
            <?php $header_h1 = ob_get_clean(); ?>

            <a href="index.php?action=logout"><button type="button" class="btn btn-info mr-4">Logout</button></a>
            <?php $header_btn = ob_get_clean(); ?>

<?php } else if ($_SESSION['statut'] === 2) {
        ob_start();
    
    ?>

            <a class="navbar-brand" href="#">Dashboard <?= $_SESSION['pseudo'] ?> </a>               
            <?php $header_h1 = ob_get_clean(); ?>
                
            <a href="index.php?action=writeAPost"><button type="button" class="btn btn-info mr-4">Nouvel article</button></a>
            <a href="index.php?action=moderateComments"><button type="button" class="btn btn-info mr-4">Modérer les commentaires</button></a>
            <a href="index.php?action=logout"><button type="button" class="btn btn-info mr-4">Logout</button></a>

<?php
            $header_btn = ob_get_clean();
        }
    }
} else { 
ob_start();
?>
        
            <?= 'Billet simple pour l\'Alaska' ?>
            <?php $header_h1 = ob_get_clean();?>
                    
            <a class="Btn_link" href="index.php?action=signMeIn"><button class="btn btn-info">Sign in</button></a>
            <a class="Btn_link" href="index.php?action=logMeIn"><button class="btn btn-info">Log in</button></a>
        
            <?php $header_btn = ob_get_clean();
        
}?>