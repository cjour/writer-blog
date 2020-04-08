<?php 
$title = "Interface d'administration des commentaires";
ob_start();?>

    <h1>Administration des commentaires</h1>
        
<?php
    $content = ob_get_clean();
    require 'template.php';
?>    