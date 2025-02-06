<?php


$path = str_replace(DIRECTORY_SEPARATOR, '/', dirname(__DIR__, 1). '/modeles/bddModele.php' ) ;


require $path;

$request = new BddModele();

// $filmsearch = $_GET["title-search"];
// $rechercher = $_GET["rechercher"];

// if(isset($rechercher) && !empty(trim($titlesearch))){
//     // $words=explode(" ", trim($titlesearch));
//     $alltitles = $request->execute("SELECT * FROM genre
//         WHERE title LIKE \"%'.$search.'%\"
//         ORDER BY title ASC
//         LIMIT 20");
// }

if(isset($_GET["title-search"]) AND !empty($_GET["title-search"])){
    $search = htmlspecialchars($_GET["title-search"]);
    $movies = $request->execute(
    "SELECT title FROM movie
    WHERE title LIKE "%'.$search.'%"
    ORDER BY title ASC
    LIMIT 20");
}

