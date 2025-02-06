<div class="filter-section">


<div class="genre">

    <form action="" method="POST">

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


        <input type="submit" name="genre-button" value="Rechercher" />

    </form>
</div>

<div class="distributor">

    <form action="" method="POST">

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

        <input type="submit" name="dist-button" value="Rechercher" />

    </form>
</div>

</div>

<div class="film-tab-section">

<div class="title-film">
    <form name="formulaire" method="GET">
        <input type="search" id="film-search" name="s" placeholder="Rechercher un film..." />
        <input type="submit" name="search-button" value="Rechercher" />
    </form>

</div>