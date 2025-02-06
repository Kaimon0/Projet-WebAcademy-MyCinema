<?php

class BddModele
{
    private $connection;


    //connexion de la base de données

    public function __construct()
    {
        try {
             $this->connection = new PDO("mysql:host=localhost;dbname=my_cinema", 'mycine_app', 'cinepswd');
        } catch (PDOException $e) {
             echo "Erreur : " . $e->getMessage();
            die();
        }
    }

      //execution de la requête
     //stockage du résultat dans un tableau associatif
    //PDO::FETCH_ASSOC: constante recuperant les donnnées et
    //les places dans un tableau associatif indexé par le nom de ces colonnes
    public function execute($query)
    {
        $result = $this->connection->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }


    //deconnexion de la base de données
    public function close()
    {
        $this->connection = null;
    }
}
