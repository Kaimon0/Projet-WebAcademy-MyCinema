<?php

include "../../serveur/controllers/controler.film.php" ;


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mycinema.css">


    <title>Films</title>

</head>

<body>
    <div class="box">
        <header>

            <nav>

                <a href="index.html">
                &#x3008; Retour à la page d'accueil
                </a>

                <div class="cinema-title">

                    <h1>Film</h1>
                </div>
            </nav>

        </header>

        <main>


            <div class="filter-section">


                <div class="filtre">

                    <form method="POST">

                        <select name="deroulant_genre">

                            <option value=""> Sélectionner un Genre </option>

                            <?php
                            foreach ($genre as $genre_movie) {
                                ?>

                                <option value="<?= $genre_movie["id"]; ?>">

                                    <?= $genre_movie["name"] ?>

                                </option>

                                <?php
                            }

                            ?>

                        </select>

                        <select name="deroulant_dist">

                            <option value=""> Sélectionner un distributeur </option>

                            <?php
                            foreach ($distributor as $dist_movie) {
                                ?>

                                <option value="<?= $dist_movie["id"]; ?>">

                                    <?= $dist_movie["name"] ?>

                                </option>
                                <?php
                            }

                            ?>

                        </select>

                        <input class= "search" type="search" id="film-search" name="s" placeholder="Rechercher un film...">

                        <input class= "button" type="submit" name="button" value="Rechercher">

                    </form>

                </div>

                <div class="pagination_form">
                    <form method="GET">

                        <select name="pagination">

                            <option value="">Nombre de films à afficher</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>

                        </select>

                        <input class= "button" type="submit" name="button_page" value="Afficher">
                    </form>
                </div>
            </div>

            <div class="film-tab-section">


                <div class="movie-table">

                    <table class="table">
                        <thead>
                            <th>Titre</th>
                            <th>Date de sortie</th>
                            <th>Genre</th>
                            <th>Distributeur</th>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($movies as $film) {
                                ?>
                                <tr>
                                    <td>
                                        <?= $film["title"] ?>
                                    </td>
                                    <td>
                                        <?= $film["release_date"] ?>
                                    </td>

                                    <td>
                                        <?= $film["genre"] ?>
                                    </td>
                                    <td>
                                        <?= $film["distributor"] ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </main>
    </div>
</body>

</html>