<?php

class Manager {

    protected function dbConnexion(){
        
        $db = new PDO('mysql:host=localhost;dbname=jocl8574_forterocheJ;charset=utf8', 'jocl8574_jocl8574', 'pQHrzi6[hDsC', array(PDO::ATTR_ERRMODE 
        => PDO::ERRMODE_EXCEPTION));
        return $db;

    }
}