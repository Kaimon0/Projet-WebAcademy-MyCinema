<?php

include "../../serveur/controllers/controler.users.php" ;

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mycinema.css">

    <title>Membres</title>

</head>

<body>
    <div class="box">
        <header>

            <nav>

                <a  href="membres_list.php">
                &#x3008; Retour à la liste des membres
                </a>


            </nav>

        </header>


        <main>

            <div class="perso">
                <?php
                foreach ($userdetails as $userprofil) {
                    ?>
                    <div class="cinema-title">

                        <h1>
                            <?= $userprofil["firstname"] ?>
                            <?= $userprofil["lastname"] ?>
                        </h1>
                    </div>

                    <?php
                }
                ?>

                <div class="type_abo">

                    <p>Membre:</p>

                    <?php

                    if (!empty($membership)) {
                        foreach ($membership as $membre) {
                            ?>
                            <p class="type_membership">
                                <?= $membre["Abonnement"] ?>
                            </p>

                            <?php
                        }
                    } else {
                        ?>
                        <p class="type_membership">
                            Pas d'abonnement
                        </p>
                        <?php
                    }

                    ?>
                </div>

            </div>

            <div class="abo">

                <form method="POST">

                    <select name="abo">

                        <option value=""> Sélectionner un abonnement </option>

                        <option value="none"> Sans abonnement </option>
                        <?php
                        foreach ($sub as $subscription) {
                            ?>

                            <option value="<?= $subscription["id"]; ?>">

                                <?= $subscription["name"]; ?>

                            </option>

                            <?php
                        }

                        ?>

                    </select>


                    <input class= "button"type="submit" name="sub-button" value="modifier" />

                </form>
            </div>

        </main>
    </div>

</body>