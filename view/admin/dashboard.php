<?php

$title = "Dashboard admin";


ob_start(); ?>

<div class="container mt-5">
    <h1>Gestion des Admins</h1>
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

    <a class="btn btn-danger my-2" href="./?path=admin&action=addAdmin">Ajouter un admin</a>
    <table class="table mt-5">
        <theader>
            <tr class="align-middle">
                <th class="liste-table">Id</th>
                <th class="liste-table">Nom</th>
                <th class="liste-table">Email</th>
                <th class="liste-table">Action</th>
            </tr>
        </theader>
        <tbody>
            <?php foreach ($admins as $admin) { ?>
                <tr class=" align-middle">
                    <td class="liste-td"><?= $admin->getIdAdmin() ?></td>
                    <td class="liste-td"><?= $admin->getNom() ?></td>
                    <td class="liste-td"><?= $admin->getEmail() ?></td>
                    <td class="liste-td"> <a href="?path=admin&action=formUpdate&id=<?= $admin->getIdAdmin() ?>" class="btn btn-primary">Modifier</a>

                        <form class="mt-2" action="?path=admin&action=processDelete" method="post">
                            <input type="hidden" name="id" value="<?= $admin->getIdAdmin() ?>">
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