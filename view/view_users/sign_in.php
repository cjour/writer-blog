<?php $title='SIGN IN' ?>
<?php ob_start();?>      

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