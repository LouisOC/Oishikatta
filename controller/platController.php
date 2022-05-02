<?php

$action = filter_var($_GET["action"] ?? "categorie", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

switch ($action) {


    case "plat":
        $id = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);
        $objectPlat = new PlatManager($lePDO);
        $plats = $objectPlat->fetchAllPlatbyIdCategorie($id);

        //Je souhaite récupérer l'id pour afficher le titre de chaque catégorie des plats tels qu'entrées plats et desserts
        $objectCategorie = new CategorieManager($lePDO);
        $categorie = $objectCategorie->fetchTitrebyID($id);

        require("view/categorie/plat.php");
        break;

    case "dashboard":
        $role = $_SESSION["role"] ?? false;
        if ($role == "admin") {
            $objetPlatManager = new PlatManager($lePDO);
            $plats = $objetPlatManager->fetchAllPlat();
            require("view/categorie/dashboard.php");
        } else {
            $_SESSION["erreur"] = "Echec d'accès";
            require('view/404.php');
        }
        break;

    case "addPlat":
        $role = $_SESSION["role"] ?? false;
        if ($role == "admin") {
            require("view/categorie/addPlat.php");
        } else {
            $_SESSION["erreur"] = "Echec d'accès";
            require('view/404.php');
        }
        break;

    case "traitementPlat":
        $role = $_SESSION["role"] ?? false;
        if ($role == "admin") {
            $titre = filter_var($_POST["titre"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $description = filter_var($_POST["description"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $prix  = filter_var($_POST["prix"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $image_plat = filter_var($_FILES["image"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $id_categorie = filter_var($_POST["idcategorie"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $objetPlatManager = new PlatManager($lePDO);
            $resultat = $objetPlatManager->createPlat($titre, $description, $prix, $image_plat, $id_categorie);
            move_uploaded_file($_FILES["image"]["tmp_name"], "public/images/plats/image$image_plat.jpg");
            if ($resultat == true) {

                $_SESSION["validation"] = ["Ajout d'un plat réussi !"];
                header("location:?path=plat&action=dashboard");
            } else {
                $_SESSION["erreur"] = ["Echec de l'ajout"];
                header("location:?path=plat&action=addPlat");
            }
        } else {
            $_SESSION["erreur"] = "Echec d'accès";
            require('view/404.php');
        }
        break;

    case "processDelete":
        $role = $_SESSION["role"] ?? false;
        if ($role == "admin") {
            $id = filter_var($_POST["id"], FILTER_SANITIZE_NUMBER_INT);
            $objectPlatManager = new PlatManager($lePDO);
            $resultat = $objectPlatManager->deletePlat($id);
            if ($resultat) {
                $_SESSION["validation"] = ["Suppression réussie"];
                header("location:?path=plat&action=dashboard");
            } else {
                $_SESSION["erreur"] = ["Echec de la suppression"];
                header("location:?path=plat&action=dashboard");
            }
        } else {
            require("view/404.php");
            exit;
        }
        break;


    default:
        require("view/404.php");
}
