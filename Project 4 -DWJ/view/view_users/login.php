<?php $title='Jean FORTEROCHE' ?>
<?php session_start();?>
<?php ob_start();?>        

<section class="row justify-content-center">
    <form class="col col-sm-10 col-md-8 col-lg-5 col-justify-content-center" action="index.php?action=verifyMyLogin" method="POST">
        <h1>LOGIN</h1>

        <input type="text" name= "Pseudo" placeholder="Pseudo" required>
        <input type="text" name= "Password" placeholder="Password" required>

        <input type="submit" value="LOGIN">
        <div>
            <input type="checkbox">
            <label for="">Remember me</label>
        </div>              
    </form>
</section>

<?php $content = ob_get_clean();

require 'template.php';
?>

