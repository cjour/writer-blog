<?php $title='Jean FORTEROCHE' ?>
<?php ob_start();?>        
Billet pour l'Alaska      
    
<?php $header_h1 = ob_get_clean(); ?>
<a href="index.php?action=listMyPosts"><button type="button" class="btn btn-info mr-4">Home</button></a>
<button class="btn btn-info"><a class="Btn_link" href="index.php?action=signMeIn">Sign in</a></button>
<button class="btn btn-info"><a class="Btn_link" href="index.php?action=logMeIn">Log in</a></button>

<?php 
$header_btn = ob_get_clean(); 
ob_start();
?>
<section class="row justify-content-center">
    <form class="col col-sm-10 col-md-8 col-lg-5 col-justify-content-center" action="index.php?action=verifyMySignIn" method="POST">
        <h1>SIGN IN</h1>

        
        <input type="text" name= "Pseudo" placeholder="Pseudo" required>
        <input type="email" name="Email" placeholder="E-mail" required>
        <input type="password" name= "Password" placeholder="Password" required> 
        <input type="password" name= "PasswordConfirm" placeholder="Confirm your password" required>

        <input type="submit" value="Sign in">
            
            
    </form>
</section>

<?php $content = ob_get_clean();

require 'template.php';
?>