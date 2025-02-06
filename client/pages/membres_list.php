<?php

include("../../serveur/controllers/controler.users.php");

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mycinema.css">

    <title>Listes des membres</title>

</head>

<body>
    <div class="box">

        <header>

            <nav>

                <a href="index.html">
                &#x3008; Retour à la page d'accueil
                </a>
                <div class="cinema-title">

                    <h1>Liste des membres</h1>
                </div>
            </nav>

        </header>

        <main>

            <div class="clients-search">
                <form name="form" method="GET">
                    <input class= "search" type="search" id="clients-list" name="c" 
                    placeholder="Rechercher un clients..." />
                    <input class= "button" type="submit" name="client-button" value="Rechercher" />
                </form>

            </div>

            <form method="GET">

                <select name="pagination">

                    <option value="">Nombre de d'utilisateurs à afficher</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>

                </select>

                <input class= "button" type="submit" name="button_page" value="Afficher" />

            </form>


            <div class="film-tab-section">

                <table class="table">
                    <th>Prénom</th>
                    <th>Nom</th>

                    <tbody>
                        <?php
                        foreach ($users as $members) {
                            ?>

                            <tr>
                                <td>
                                    <?= $members["firstname"] ?>
                                </td>

                                <td>
                                    <?= $members["lastname"] ?>
                                </td>

                                <td class="link-users">
                                    <a href="<?= 'membre.php?id=' . $members['id'] . '' ?>">
                                        Voir le profil
                                    </a>
                                </td>

                            </tr>
                            <?php
                        }
                        ?>

                    </tbody>

                </table>

            </div>

        </main>

    </div>
</body>