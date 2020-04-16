<?php $title='LOGIN'; 
ob_start();
?>

<section class="row justify-content-center">
    <form class="col col-sm-10 col-md-8 col-lg-5 col-justify-content-center" action="index.php?action=verifyMyLogin" method="POST">
        <h1>LOGIN</h1>

        <input type="text" name= "Pseudo" placeholder="Pseudo" required>
        <input type="password" name= "Password" placeholder="Password" required>

        <input type="submit" value="LOGIN">
              
    </form>
</section>

<?php $content = ob_get_clean();

require 'template.php';
?>

