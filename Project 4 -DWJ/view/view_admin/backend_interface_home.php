<?php 
$title = "Accueil";
session_start();
ob_start();?>

    <h1>Bienvenue dans votre espace administrateur Jean.</h1>
        
        <section class="fluid-container">
        <h2>Articles</h2>
            <section class="row d-flex justify-content-around mr-b-3 no-gutters">  
                    <a href="index.php?action=verifyMyLogin/admin/read"><button type="button"><i class="fab fa-readme ml-1 mr-2"></i>Read</button></a>
                    <a href="index.php?action=verifyMyLogin/admin/write"><button type="button"><i class="fas fa-pencil-alt ml-1 mr-2"></i>Write</button></a>
                    <a href="index.php?action=verifyMyLogin/admin/update"><button type="button"><i class="fas fa-arrow-up ml-1 mr-2"></i>Update</button></a>
                    <a href="index.php?action=verifyMyLogin/admin/delete"><button type="button"><i class="far fa-trash-alt ml-1 mr-2"></i>Delete</button> </a>
            </section>
        
        <h2>Commentaires</h2>
            <section class="row d-flex justify-content-around mr-b-3 no-gutters">  
                
            </section>
        </section>
  

<?php
    $content = ob_get_clean();
    require 'template.php';
?>    