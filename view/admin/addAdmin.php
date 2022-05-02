<?php

$title = "Ajouter un admin";

ob_start(); ?>
<div class="container mt-5">
    <form action="./?path=admin&action=traitementInscription" method="post" class="d-flex justify-content-center">
        <section class="my-2">
            <h1 class="text-center mb-5">Formulaire d'inscription</h1>

            <div class="my-2 col-lg-12 col-md-8">
                <label for="inputNom">Nom* </label>
                <input minlength="2" name="nom" id="inputNom" type="text" class="form-control" required />
            </div>
            <hr>


            <div class="my-2 col-lg-12 col-md-8">
                <label for="inputEmail">Email* </label>
                <input name="email" id="inputEmail" type="email" class="form-control" required>
            </div>
            <hr>
            <div class="my-2 col-lg-12 col-md-8">
                <label for="inputMDP1">Mot de passe* </label>
                <input minlength="8" name="mdp1" id="inputMDP1" type="password" class="form-control" required>
            </div>
            <hr>
            <div class="my-2 col-lg-12 col-md-8">
                <label for="inputMDP1">Confirmation de mot de passe* </label>
                <input minlength="8" name="mdp2" id="inputMDP2" type="password" class="form-control" required>
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