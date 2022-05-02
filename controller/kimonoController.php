<?php

$action = filter_var($_GET["action"] ?? "kimono", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

switch ($action) {


    case "kimono":
        //Tous les kimonos
        //Etape 1 Creation de KimonoManager et  la classe kimono
        //Etape 2 Creation de fetchAllKimonos
        //Etape 3 : instancier un objet kimonoManager
        $objectKimonoManager = new KimonoManager($lePDO);
        //Etape 4 : dans une variable recuperer toute les destinations grace a fetchAllDestinations
        $kimonos = $objectKimonoManager->fetchAllKimonos();
        //Etape 5 : Créer la vue qui va afficher les cards et la required ici
        require("view/kimono.php");
        break;

    case "dashboard":
        $role = $_SESSION["role"] ?? false;
        if ($role == "admin") {
            $objectKimonoManager = new KimonoManager($lePDO);
            $kimonos = $objectKimonoManager->fetchAllKimonos();
            require("view/kimono/dashboard.php");
        } else {
            $_SESSION["erreur"] = "Echec d'accès";
            require('view/404.php');
        }
        break;

    case "formUpdate":
        $role = $_SESSION["role"] ?? false;
        if ($role == "admin" || $role == "superAdmin") {
            $id = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);
            $objectKimonoManager = new KimonoManager($lePDO);
            $kimonos = $objectKimonoManager->fetchKimonobyId($id);
            require("view/kimono/kimonoUpdate.php");
        } else {
            require("view/404.php");
            exit;
        }
        break;


    default:
        require("view/404.php");
}
