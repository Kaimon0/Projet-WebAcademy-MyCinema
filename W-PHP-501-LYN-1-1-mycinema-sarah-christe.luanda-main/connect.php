<?php 
//connexion à la base de données
try{
    $db = new PDO("mysql:host=localhost;dbname=my_cinema", 'sarah_luanda', 'admin');

} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    die();
}
