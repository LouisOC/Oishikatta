<?php $title = "Menu" ?>

<?php ob_start(); ?>
<h1 class="py-5 bg-danger titre">Menu</h1>
<div class="container mt-5 text-dark">
    <div class="card-group">
        <?php
        foreach ($categories as $uneCategorie) {
        ?>
            <div class="card">
                <a href="?path=plat&action=plat&id=<?= $uneCategorie->getIdCategorie() ?>">
                    <img src="public/images/plats/<?= $uneCategorie->getNomImage() ?>" class="card-img-top img-fluid photo" alt="...">
                </a>
                <div class="card-body">
                    <h1 class="card-title"><?= $uneCategorie->getTitre() ?></h1>
                    <p class="card-text"><?= $uneCategorie->getDescription() ?></p>

                </div>
            </div>
        <?php } ?>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require("template.php"); ?>