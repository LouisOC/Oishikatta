<?php

$title = "Ajouter un plat";

ob_start(); ?>


<div class="container mt-5">
    <form action="./?path=plat&action=traitementPlat" method="post" class="d-flex justify-content-center" enctype="multipart/form-data">
        <section class="my-2">
            <h1 class="text-center mb-5">Formulaire d'ajout d'un plat</h1>

            <div class="my-2 col-lg-12 col-md-8">
                <label for="inputNom">Titre </label>
                <input minlength="2" required name="titre" id="inputNom" type="text" class="form-control">
            </div>
            <hr>


            <div class="my-2 col-lg-12 col-md-8">
                <label for="inputEmail">Description </label>
                <textarea required name="description" id="inputDescription" cols="30" rows="5" class="form-control"></textarea>
            </div>

            <hr>
            <div class="my-2 col-lg-12 col-md-8">
                <label for="prix">Prix en €</label>
                <input required type="number" name="prix" min="1" step="1" max="100" class="form-control" />

            </div>
            <hr>

            <input class="form-control" type="file" name="image" id="fileImage">

            <div class="my-2 col-lg-12 col-md-8">
                <label for="idcateg">Id Catégorie </label>
                <input required type="number" name="id_categorie" min="1" step="1" max="3" class="form-control" />
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