<?php $title = "Accueil" ?>

<?php ob_start(); ?>

<div class="py-5">
    <h1 class="p-5">Le restaurant Oishikatta</h1>

    <h2 class="p-5">Spécialisé dans les plats japonais authentiques, un dépaysage garanti</h2>
</div>

<div class="container-fluid">
    <div class="row">
        <img class="img-fluid  ichi" src="public/images/ramen.jpg" alt="">
    </div>
</div>

<div>
    <h2 class="py-5">La véritable cuisine japonaise et ses plats préparés avec amour</h2>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-md-12">
            <img class="img-fluid photo" src="public/images/bar.jpg" alt="">
        </div>
        <div class="col-lg-4 col-md-12">
            <img class="img-fluid photo" src="public/images/tonkatsu.jpg" alt="">
        </div>
        <div class="col col-lg-4 col-sm-12">
            <img class="img-fluid photo" src="public/images/table.jpg" alt="">
        </div>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require("template.php");
