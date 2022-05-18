<?php

$title = "Dashboard horaires ouverture";


ob_start(); ?>

<div class="container mt-5">
    <h1>Gestion des horaires d'ouverture</h1>
    <!-- Affichage des messages d'erreurs et validation -->
    <?php
    if (isset($_SESSION["erreur"])) {
    ?>
        <div class="alert alert-danger"><?= $_SESSION["erreur"] ?></div>
    <?php
        unset($_SESSION["erreur"]);
    } else if (isset($_SESSION["validation"])) {
    ?>
        <div class="alert alert-primary"><?= $_SESSION["validation"] ?></div>
    <?php
        unset($_SESSION["validation"]);
    }
    ?>

    <a class="btn btn-danger my-2" href="./?path=horairesouverture&action=addJour">Ajouter un jour</a>
    <table class="table mt-5">
        <theader>
            <tr class="align-middle">
                <th class="liste-table">Id</th>
                <th class="liste-table">Nom</th>
                <th class="liste-table">Horaires d'ouverture</th>
                <th class="liste-table">Horaires de fermeture</th>
            </tr>
        </theader>
        <tbody>
            <?php foreach ($horairesouvertures as $horairesouverture) { ?>
                <tr class=" align-middle">
                    <td class="liste-td"><?= $horairesouverture->getIdHorairesOuverture() ?></td>
                    <td class="liste-td"><?= $horairesouverture->getNom() ?></td>
                    <td class="liste-td"><?= $horairesouverture->getHeureOuverture() ?></td>
                    <td class="liste-td"><?= $horairesouverture->getHeureFermeture() ?></td>
                    <td class="liste-td"> <a href="?path=horairesouverture&action=jourUpdate&id=<?= $horairesouverture->getIdHorairesOuverture() ?>" class="btn btn-primary">Modifier</a>

                        <form class="mt-2" action="?path=horairesouverture&action=processDelete" method="post">
                            <input type="hidden" name="id" value="<?= $horairesouverture->getIdHorairesOuverture() ?>">
                            <button class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>

                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>
<?php

$content = ob_get_clean();

require("view/template.php");
?>