<?php

$title = "Ajouter un kimono";

ob_start(); ?>
<div class="container mt-5">

    <form action="./?path=kimono&action=traitementAjout" method="post" class="d-flex justify-content-center" enctype="multipart/form-data">
        <section class="my-2">
            <h1 class="text-center mb-5">Formulaire d'ajout de kimono</h1>

            <div class="my-2 col-lg-12 col-md-8">
                <label for="inputNom">Titre* </label>
                <input minlength="2" name="titre" type="text" class="form-control" required />
            </div>
            <hr>

            <input class="form-control" name="image" type="file" id="fileImage">

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