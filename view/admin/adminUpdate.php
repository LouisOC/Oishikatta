<?php

$title = "Modifier un admin";

ob_start(); ?>
<div class="container mt-5">
    <form novalidate action="./?path=admin&action=processUpdate" method="post" class="d-flex justify-content-center">
        <input type="hidden" name="id" value="<?= $admins->getIdAdmin() ?>">
        <section class="my-2">
            <h1 class="text-center mb-5">Formulaire de modification d'un administrateur</h1>

            <div class="my-2 col-lg-12 col-md-8">
                <label for="inputNom">Nom* </label>
                <input minlength="2" required name="nom" id="inputNom" type="text" class="form-control" value="<?= $admins->getNom() ?>">
            </div>
            <hr>


            <div class="my-2 col-lg-12 col-md-8">
                <label for="inputEmail">Email* </label>
                <input required name="email" id="inputEmail" type="email" class="form-control" value="<?= $admins->getEmail() ?>">
            </div>
            <hr>
            <div class="my-2 col-lg-12 col-md-8">
                <label for="inputMDP1">Mot de passe* </label>
                <input minlength="8" required name="mdp1" id="inputMDP1" type="password" class="form-control" value="<?= $admins->getPassword() ?>">
            </div>
            <hr>
            <div class="my-2 col-lg-12 col-md-8">
                <label for="inputMDP1">Confirmation de mot de passe* </label>
                <input minlength="8" required name="mdp2" id="inputMDP2" type="password" class="form-control" value="<?= $admins->getPassword() ?>">
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