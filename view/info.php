<?php $title = "Informations pratiques" ?>

<?php ob_start(); ?>

<h1 class="py-5 bg-danger titre">Infos pratiques</h1>

<div class="row mt-5 p-5 border d-flex align-items-center ">
    <div class="col-lg-4 col-md-12">
        <table class="table table-bordered ">
            <tr>
                <th class="liste-table">Jour</th>
                <th class="liste-table">Horaires d'ouverture</th>
                <th class="liste-table">Horaires de fermeture</th>
            </tr>
            <?php
            foreach ($horairesOuverture as $creneau) {
            ?>
                <tr>
                    <td class="align-middle liste-td"><?= $creneau->getNom() ?></td>
                    <td class="align-middle liste-td"><?= $creneau->getHeureOuverture() ?></td>
                    <td class="align-middle liste-td"><?= $creneau->getHeureFermeture() ?></td>

                </tr>
            <?php } ?>
        </table>

    </div>
    <div class="col-lg-4">
        <h2 class="text-decoration-underline">Régimes alimentaires</h1>
            <br>
            <p>Plats végétariens disponibles</p>
            <p>La viande proposée par le restaurant est halal</p>
    </div>
    <div class="col-lg-4">
        <h2 class="text-decoration-underline">Localisation</h1>
            <br>
            <p>Oishikatta</p>
            <p>1 rue des morands</p>
            <p>93360 Neuilly-Plaisance</p>

    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require("template.php"); ?>