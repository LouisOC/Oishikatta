<?php

$title = "Dashboard plat";


ob_start(); ?>

<div class="container mt-5">
    <h1>Gestion des Plats</h1>
    <!-- Affichage des messages d'erreurs et validation -->
    <?php if (isset($_SESSION['erreur'])) {
        echo ("<div class='text-danger fw-bold h2 text-center list-unstyled my-4'>");
        foreach ($_SESSION['erreur'] as $msgErreur) {
            echo "<li>" . $msgErreur . "</li>";
        }
        echo ("</div>");
        unset($_SESSION['erreur']);
    } elseif (isset($_SESSION['validation'])) {
        echo ("<div class='text-success fw-bold h2 text-center list-unstyled my-4'>");
        foreach ($_SESSION['validation'] as $msgValidation) {
            echo "<li>" . $msgValidation . "</li>";
        }
        echo ("</div>");
        unset($_SESSION['validation']);
    }
    ?>

    <a class="btn btn-danger my-2" href="./?path=plat&action=addPlat">Ajouter un plat</a>
    <table class="table mt-5 text-center">
        <theader>
            <tr class=" align-middle">

                <th class="liste-table">Id</th>
                <th class="liste-table">Titre</th>
                <th class="liste-table">Description</th>
                <th class="liste-table">Prix</th>
                <th class="liste-table">Image</th>
                <th class="liste-table">Id categorie</th>
                <th class="liste-table">Action</th>
            </tr>
        </theader>
        <tbody>
            <?php foreach ($plats as $plat) { ?>
                <tr class=" align-middle">
                    <td class="liste-td"><?= $plat->getIdPlat() ?></td>
                    <td class="liste-td"><?= $plat->getTitre() ?></td>
                    <td class="liste-td"><?= $plat->getDescription() ?></td>
                    <td class="liste-td"><?= $plat->getPrix() ?></td>
                    <td class="liste-td"><img src="public/images/plats/<?= $plat->getImagePlat() ?>" width="40px;"></td>
                    <td class="liste-td"><?= $plat->getIdCategorie() ?></td>
                    <td class="liste-td"> <a href="?path=plat&action=formUpdate&id=<?= $plat->getIdPlat() ?>" class="btn btn-primary">Modifier</a>

                        <form class="mt-2" action="?path=plat&action=processDelete" method="post">
                            <input type="hidden" name="id" value="<?= $plat->getIdPlat() ?>">
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