<?php $title = "Categorie" ?>

<?php ob_start(); ?>

<h1 class="py-5 bg-danger titre"><?= $categorie->getTitre(); ?></h1>

<div class="container mt-5 text-dark">
    <div class="card-group">
        <?php

        foreach ($plats as $unPlat) {
        ?>
            <div class="card">
                <img src="<?= $unPlat->getImagePlat(); ?>" class="card-img-top img-fluid photo" alt="...">
                </a>
                <div class="card-body">
                    <h3 class="card-title"><?= $unPlat->getTitre(); ?></h3>
                    <p class="card-text mt-5"><?= $unPlat->getDescription(); ?></p>
                    <p class="card-text"><?= $unPlat->getPrix(); ?>€</p>

                </div>
            </div>


        <?php } ?>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require("view/template.php");
