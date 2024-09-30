<?php

include ("modele.php");

$select_clients = "SELECT * FROM user";
$users = $request->execute("
$select_clients 
ORDER BY lastname ASC
LIMIT 20");

if(isset($_GET['c']) AND !empty($_GET["c"])){

    $client_search = htmlspecialchars($_GET["c"]);

    $users = $request->execute("
    $select_clients
    WHERE firstname OR lastname 
    LIKE '%".$client_search."%'
    ORDER BY lastname ASC
    LIMIT 20");
    
}