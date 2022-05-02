<?php

$title = "Dashboard kimonos";


ob_start(); ?>

<div class="container mt-5">
    <h1>Gestion des kimonos</h1>
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

    <a class="btn btn-danger my-2" href="./?path=kimono&action=addAdmin">Ajouter un kimono</a>
    <table class="table mt-5">
        <theader>
            <tr class="align-middle">
                <th class="liste-table">Id</th>
                <th class="liste-table">Nom</th>
                <th class="liste-table">Image</th>
                <th class="liste-table">Action</th>
            </tr>
        </theader>
        <tbody>
            <?php foreach ($kimonos as $kimono) { ?>
                <tr class=" align-middle">
                    <td class="liste-td"><?= $kimono->getIdKimono() ?></td>
                    <td class="liste-td"><?= $kimono->getTitre() ?></td>
                    <td class="liste-td"><img src="public/kimonos/<?= $kimono->getImageKimono() ?>" width="40px;"></td>
                    <td class="liste-td"> <a href="?path=kimono&action=formUpdate&id=<?= $kimono->getIdKimono() ?>" class="btn btn-primary">Modifier</a>

                        <form class="mt-2" action="?path=kimono&action=processDelete" method="post">
                            <input type="hidden" name="id" value="<?= $kimono->getIdKimono() ?>">
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