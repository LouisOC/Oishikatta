<?php

$action = filter_var($_GET["action"] ?? "reservation", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

switch ($action) {

    case "traitementReservation":

        $nombre = filter_var($_POST["nombre"], FILTER_SANITIZE_NUMBER_INT);
        $email = filter_var($_POST["email"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $nom = filter_var($_POST["nom"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $jour = filter_var($_POST["jour"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $heure = filter_var($_POST["heure"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $tel = filter_var($_POST["tel"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $objetReservation = new ReservationManager($lePDO);
        $resultat = $objetReservation->createReservation($nombre, $email, $nom, $jour, $heure, $tel);
        if ($resultat == true) {
            require("view/admin/confirmationReservation.php");
        } else {
            require("view/404.php");
        }

        break;



    default:
        require("view/404.php");
}
