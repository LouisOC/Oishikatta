<?php
$title = "Shop : Connexion";
ob_start(); ?>

<?php if (isset($_SESSION['erreur'])) {


    echo ("<div class='text-danger text-center list-unstyled my-3'>");

    foreach ($_SESSION['erreur'] as $msgErreur) {
        echo "<li>" . $msgErreur . "</li>";
    }
    echo ("</div>");

    unset($_SESSION['erreur']);
} ?>

<div class="row align-items-start m-auto">
    <div class="container-fluid">


        <form method="post" action="./?path=admin&action=traitementLogin" class="d-flex justify-content-center" novalidate>

            <section class="my-2 ">
                <h1 class="text-center mb-5"> Connexion </h1>
                <div class="my-2 col-lg-12 col-md-8">
                    <label for="inputMail">Email l'admin</label>
                    <input required minlenght="6" id="inputMail" type="email" name="email" placeholder="example@email.com" class="form-control">
                </div>
                <div class="my-2 col-lg-12 col-md-8">
                    <label for="Mdp">Mot de passe de l'admin</label>
                    <input required minlenght="6" id="inputMdp" name="password" placeholder="Mot de passe" type="password" class="form-control">
                </div>
                <div class="d-flex justify-content-center my-5"><button class="btn btn-danger">Envoyer</button></div>
            </section>
        </form>


    </div>
</div>


<?php $content = ob_get_clean();
require("view/template.php"); ?>