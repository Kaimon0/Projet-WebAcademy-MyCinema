<?php

$path = str_replace(DIRECTORY_SEPARATOR, '/', dirname(__DIR__, 1). '/modeles/bddModele.php' ) ;


require $path;

$request = new BddModele();

//affiche les films
$movies = $request->execute("SELECT *, movie.title, movie.release_date, genre.name As 'genre', distributor.name As 'distributor' FROM movie_genre
INNER JOIN genre ON movie_genre.id_genre = genre.id
INNER JOIN movie ON movie_genre.id_movie = movie.id
INNER JOIN distributor ON movie.id_distributor = distributor.id 
ORDER BY title ASC
LIMIT 20");


//recherche les films
if(isset($_GET['s']) AND !empty($_GET["s"])){

    $search = htmlspecialchars($_GET["s"]);

    $movies = $request->execute('SELECT *, movie.title, movie.release_date, genre.name As "genre", distributor.name As "distributor" FROM movie_genre
    INNER JOIN genre ON movie_genre.id_genre = genre.id
    INNER JOIN movie ON movie_genre.id_movie = movie.id
    INNER JOIN distributor ON movie.id_distributor = distributor.id 
    WHERE movie.title LIKE "%'.$search.'%"
    ORDER BY title ASC
    LIMIT 20');

}

$genre = $request->execute('SELECT * FROM genre');

if(isset($_POST["genre-button"])) {

     $idgenre = $_POST["category"];

    // $array = array_column($checked, $genre_movie['id']);

    if(!empty($_POST["deroulant_genre"])) {


    $movies = $request->execute("SELECT *, movie.title, movie.release_date, genre.name As 'genre', distributor.name As 'distributor' FROM movie_genre
    INNER JOIN genre ON movie_genre.id_genre = genre.id
    INNER JOIN movie ON movie_genre.id_movie = movie.id
    INNER JOIN distributor ON movie.id_distributor = distributor.id 
    WHERE genre.id = $idgenre
    ORDER BY title ASC
    LIMIT 20");
    
    }
    
    var_dump($idgenre);


}
