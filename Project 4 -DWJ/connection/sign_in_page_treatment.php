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
    
//vérification des informations.

    if (isset($_POST['pseudo'])){
        
        $req = $connection_DB -> prepare('SELECT pseudo FROM users_login WHERE pseudo = :pseudo');
        $availabilityPseudo = $req -> execute(array(

            'pseudo' => $_POST['pseudo']
        
        ));
       
       

        
        
    } else {

        echo "Remplissez le champ pseudo";
    }
        //if(preg_match("#^[A-Z][0-9]$#", $POST_['pseudo']) && preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $POST_['email'])){

           //$today = date('y-m-j h:i:s'); //je récupère la date au submit.

           //$req = $connection_DB -> prepare('INSERT INTO users_login (pseudo, password, sign_in_date, email) VALUES (:pseudo, :password, :date, email)');
           //$req -> execute(array(

            //'pseudo' => $_POST['pseudo'] ,
            //'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            //'date' =>$today,
            //'email'=>$_POST['email']
        
        //));

        //header('Location:login.php');

        



?>