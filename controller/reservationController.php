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
        if ($resultat) {
            require("view/reservation/confirmationReservation.php");
        } else {
            require("view/404.php");
        }

        break;

    case "addReservation":
        $role = $_SESSION["role"] ?? false;
        if ($role == "admin") {
            require("view/reservation/addReservation.php");
        } else {
            $_SESSION["erreur"] = "Echec d'accès";
            require('view/404.php');
        }
        break;

    case "processReservation":
        $role = $_SESSION["role"] ?? false;
        if ($role == "admin") {
            $nombre = filter_var($_POST["nombre"], FILTER_SANITIZE_NUMBER_INT);
            $email = filter_var($_POST["email"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $nom = filter_var($_POST["nom"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $jour = filter_var($_POST["jour"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $heure = filter_var($_POST["heure"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $tel = filter_var($_POST["tel"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $objetReservation = new ReservationManager($lePDO);
            $resultat = $objetReservation->createReservation($nombre, $email, $nom, $jour, $heure, $tel);
            if ($resultat) {
                $_SESSION["validation"] = "Ajout d'une réservation réussie";
                header("location:?path=reservation&action=dashboard");
            } else {
                $_SESSION["erreur"] = "Echec de la suppression";
                header("location:?path=reservation&action=dashboard");
            }
        } else {
            require("view/404.php");
            exit;
        }
        break;

    case "dashboard":
        $role = $_SESSION["role"] ?? false;
        if ($role == "admin") {
            $objetReservationManager = new ReservationManager($lePDO);
            $reservations = $objetReservationManager->fetchAllReservation();
            require("view/reservation/dashboard.php");
        } else {
            $_SESSION["erreur"] = "Echec d'accès";
            require('view/404.php');
        }

        break;

    case "reservationUpdate":
        $role = $_SESSION["role"] ?? false;
        if ($role == "admin") {
            $id = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);
            $objectReservationManager = new ReservationManager($lePDO);
            $reservations = $objectReservationManager->fetchReservationbyId($id);
            require("view/reservation/reservationUpdate.php");
        } else {
            $_SESSION["erreur"] = "Echec d'accès";
            require('view/404.php');
        }
        break;

    case "processUpdate":
        $role = $_SESSION["role"] ?? false;
        if ($role == "admin") {
            $id = filter_var($_POST["id"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $nombre = filter_var($_POST["nombre"], FILTER_SANITIZE_NUMBER_INT);
            $email = filter_var($_POST["email"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $nom = filter_var($_POST["nom"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $jour = filter_var($_POST["jour"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $heure = filter_var($_POST["heure"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $tel = filter_var($_POST["tel"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $objetReservation = new ReservationManager($lePDO);
            $resultat = $objetReservation->updateReservation($id, $nombre, $email, $nom, $jour, $heure, $tel);
            if ($resultat) {
                $_SESSION["validation"] = "Modification d'une réservation réussie";
                header("location:?path=reservation&action=dashboard");
            } else {
                $_SESSION["erreur"] = "Echec de la modification";
                header("location:?path=reservation&action=dashboard");
            }
        } else {
            require("view/404.php");
            exit;
        }
        break;


    case "processDelete":
        $role = $_SESSION["role"] ?? false;
        if ($role == "admin") {
            $id = filter_var($_POST["id"], FILTER_SANITIZE_NUMBER_INT);
            $objectReservationManager = new ReservationManager($lePDO);
            $resultat = $objectReservationManager->deleteReservation($id);
            if ($resultat) {
                $_SESSION["validation"] = "Suppression réussie";
                header("location:?path=reservation&action=dashboard");
            } else {
                $_SESSION["erreur"] = "Echec de la suppression";
                header("location:?path=reservation&action=dashboard");
            }
        } else {
            require("view/404.php");
            exit;
        }
        break;



    default:
        require("view/404.php");
}
