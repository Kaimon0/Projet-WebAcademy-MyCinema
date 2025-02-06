<?php


$path = str_replace(DIRECTORY_SEPARATOR, '/', dirname(__DIR__, 1) . '/modeles/bddModele.php');

// var_dump($path);
require $path;

$request = new BddModele();


//pagination
if (isset($_GET["button_page"])) {
    $nbr_film = $_GET["pagination"];
} else {
    $nbr_film = 25;
}


//Premiere partie du select
$select_movies = "SELECT *, movie.title, movie.release_date, genre.name 
As 'genre', distributor.name 
As 'distributor' 
FROM movie_genre
INNER JOIN genre ON movie_genre.id_genre = genre.id
INNER JOIN movie ON movie_genre.id_movie = movie.id
INNER JOIN distributor ON movie.id_distributor = distributor.id";

//affiche les films
$movies = $request->execute(
    "$select_movies
ORDER BY title ASC
LIMIT $nbr_film"
);


//recherche les films par titres
if (isset($_POST['s']) and !empty($_POST["s"])) {
    $search = htmlspecialchars($_POST["s"]);

    $movies = $request->execute(
        "$select_movies 
    WHERE movie.title LIKE '%" . $search . "%'
    ORDER BY title ASC
    LIMIT $nbr_film"
    );
}

//filtre les films par genres
$genre = $request->execute('SELECT * FROM genre');

if (isset($_POST["button"])) {
    $idgenre = $_POST["deroulant_genre"];


    if (!empty($_POST["deroulant_genre"])) {
        $movies = $request->execute("
    $select_movies 
    WHERE genre.id = $idgenre
    ORDER BY title ASC
    LIMIT $nbr_film");
    }
}

//filtre les films par distributeurs
$distributor = $request->execute('SELECT * FROM distributor');

if (isset($_POST["button"])) {
    $id_distributor = $_POST["deroulant_dist"];


    if (!empty($_POST["deroulant_dist"])) {
        $movies = $request->execute(
            "$select_movies 
    WHERE distributor.id = $id_distributor
    ORDER BY title ASC
    LIMIT $nbr_film"
        );
    }
}
