<?php

$title = "Dashboard reservation";


ob_start(); ?>

<div class="container mt-5">
    <h1>Gestion des Réservations</h1>
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


    <a class="btn btn-danger my-2" href="./?path=reservation&action=addReservation">Ajouter une réservation</a>

    <table class="table mt-5">
        <theader>
            <tr class="align-middle">
                <th class="liste-table">Id</th>
                <th class="liste-table">Nombre de personnes</th>
                <th class="liste-table">Email</th>
                <th class="liste-table">Nom</th>
                <th class="liste-table">Jour</th>
                <th class="liste-table">Heure</th>
                <th class="liste-table">Numéro de téléphone</th>
            </tr>
        </theader>
        <tbody>
            <?php foreach ($reservations as $reservation) { ?>
                <tr class=" align-middle">
                    <td class="liste-td"><?= $reservation->getIdReservation() ?></td>
                    <td class="liste-td"><?= $reservation->getNombre() ?></td>
                    <td class="liste-td"><?= $reservation->getEmail() ?></td>
                    <td class="liste-td"><?= $reservation->getNom() ?></td>
                    <td class="liste-td"><?= $reservation->getJour() ?></td>
                    <td class="liste-td"><?= $reservation->getHeure() ?></td>
                    <td class="liste-td"><?= $reservation->getTel() ?></td>
                    <td class="liste-td"> <a href="?path=reservation&action=reservationUpdate&id=<?= $reservation->getIdReservation() ?>" class="btn btn-primary">Modifier</a>

                        <form class="mt-2" action="?path=reservation&action=processDelete" method="post">
                            <input type="hidden" name="id" value="<?= $reservation->getIdReservation() ?>">
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