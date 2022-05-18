<?php

$title = "Modifier un plat";

ob_start(); ?>
<div class="container mt-5">
    <form novalidate action="./?path=plat&action=updatePlat" method="post" class="d-flex justify-content-center">
        <input type="hidden" name="id" value="<?= $plats->getIdPlat() ?>">
        <section class="my-2">
            <h1 class="text-center mb-5">Formulaire de modification</h1>

            <div class="my-2 col-lg-12 col-md-8">
                <label for="inputNom">Titre </label>
                <input minlength="2" required name="titre" id="inputNom" type="text" class="form-control" value="<?= $plats->getTitre() ?>">
            </div>
            <hr>

            <div class="my-2 col-lg-12 col-md-8">
                <label for="inputNom">Description </label>
                <input minlength="2" required name="description" type="text" class="form-control" value="<?= $plats->getDescription() ?>">
            </div>
            <hr>

            <div class="my-2 col-lg-12 col-md-8">
                <label for="inputNom">Prix </label>
                <input minlength="2" required name="prix" type="text" class="form-control" value="<?= $plats->getPrix() ?>">
            </div>
            <hr>

            <div class="my-2 col-lg-12 col-md-8">
                <label for="inputNom">Image </label>
                <input minlength="2" required name="image" type="text" class="form-control" value="<?= $plats->getImagePlat() ?>">
            </div>
            <hr>

            <div class="my-2 col-lg-12 col-md-8">
                <label for="inputNom">Prix </label>
                <input minlength="2" required name="id_categorie" id="inputNom" type="text" class="form-control" value="<?= $plats->getIdCategorie() ?>">
            </div>
            <hr>




            <div class="d-flex justify-content-center my-5">
                <button class="btn btn-info">Envoyer</button>
            </div>
        </section>
    </form>


</div>
<?php

$content = ob_get_clean();

require("view/template.php");
?>