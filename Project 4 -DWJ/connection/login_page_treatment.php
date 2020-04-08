<?php

    //DB connection
$host = 'root';
$password = '';


try{

    $connection_DB = new PDO('mysql:host=localhost;dbname=forteroche;charset = utf8', $host,  $password, array(PDO::ATTR_ERRMODE 
    => PDO::ERRMODE_EXCEPTION));
    echo "Connection réalisée avec succès à la BDD".'<br>';

} catch (PDOException $e) {

    die("Connection échouée à test, l'erreur est la suivante : " . $e->getMessage());
}




$req = $connection_DB -> prepare('SELECT id, Password FROM users_login WHERE Pseudo = :pseudo');
$req ->execute(array(
    'pseudo' => $_POST['pseudo']
));


$donnees_recup = $req->fetch();


    if (password_verify($_POST['password'], $donnees_recup['Password'])){

        header('Location:index.php');

    } else {

        header('Location:login.php');

    }



?>