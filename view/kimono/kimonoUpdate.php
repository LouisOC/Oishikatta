<?php

$title = "Ajouter un admin";

ob_start(); ?>
<div class="container mt-5">
    <form novalidate action="./?path=kimono&action=processUpdate" method="post" class="d-flex justify-content-center">
        <input type="hidden" name="id" value="<?= $kimonos->getIdKimono() ?>">
        <section class="my-2">
            <h1 class="text-center mb-5">Formulaire de modification</h1>

            <div class="my-2 col-lg-12 col-md-8">
                <label for="inputNom">Titre </label>
                <input minlength="2" required name="titre" type="text" class="form-control" value="<?= $kimonos->getTitre() ?>">
            </div>
            <hr>

            <div class="my-2 col-lg-12 col-md-8">
                <label for="inputNom">Image </label>
                <input minlength="2" required name="image" type="text" class="form-control" value="<?= $kimonos->getImageKimono() ?>">
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