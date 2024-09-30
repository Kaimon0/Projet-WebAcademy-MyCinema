<?php

include("modele.php");

$request = new Modele('localhost', 'my_cinema', 'sarah_luanda', 'admin');

//pagination
if (isset($_GET["button_page"])) {
    $nbr_users = $_GET["pagination"];
} else {
        $nbr_users = 25;
}

//afficher la listes des utilisateurs
$select_clients = "SELECT * FROM user";

$users = $request->execute("
$select_clients 
ORDER BY lastname ASC
LIMIT $nbr_users");

//barre de recherche

if (isset($_GET['c']) and !empty($_GET["c"])) {
    $client_search = htmlspecialchars($_GET["c"]);

    $users = $request->execute("
    $select_clients
    WHERE firstname OR lastname 
    LIKE '%" . $client_search . "%' 
    ORDER BY lastname ASC
    LIMIT $nbr_users");
}

//changer info en fonction de l'utilisateur

$id = $_GET["id"];

if (isset($_GET['id']) and !empty($_GET["id"])) {
    $userdetails = $request->execute("
$select_clients
WHERE id = $id ");
}

if (isset($_GET['id']) and !empty($_GET["id"])) {
    $membership = $request->execute("
SELECT *, subscription.name AS 'Abonnement', user.firstname AS 'prenom', user.lastname AS 'Nom' FROM membership
INNER JOIN subscription ON membership.id_subscription = subscription.id
INNER JOIN user ON membership.id_user = user.id
WHERE membership.id_user = $id
LIMIT 20");
}

//menu déroulant abonnement
$sub = $request->execute("SELECT * FROM subscription");

if (isset($_POST["sub-button"])) {
     $abo = $_POST["abo"];

     //modifier abonnement
    if (!empty($_POST["abo"]) and $_POST["abo"] != "none") {
        if (!empty($membership)) {
            $membership = $request->execute("
        UPDATE membership 
        SET id_subscription = $abo 
        WHERE id_user = $id");
            //ajouter abonnement
        } elseif (empty($membership)) {
            $membership = $request->execute("
            INSERT INTO membership (id_user, id_subscription)
            VALUES
            ($id, $abo)");
        }


    //supprimer un abonnement
    } elseif (!empty($_POST["abo"]) and $_POST["abo"] == "none") {
        $membership = $request->execute("
        DELETE FROM membership 
        WHERE id_user = $id");
    }
}
