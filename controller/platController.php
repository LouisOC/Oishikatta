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

    case "platUpdate":
        $role = $_SESSION["role"] ?? false;
        if ($role == "admin") {
            $id = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);
            $objectPlatManager = new PlatManager($lePDO);
            $plats = $objectPlatManager->fetchPlatbyId($id);
            require("view/categorie/platUpdate.php");
        } else {
            $_SESSION["erreur"] = "Echec d'accès";
            require('view/404.php');
        }
        break;

    case "traitementPlat":
        $titre = filter_var($_POST['titre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $prix = filter_var($_POST['prix'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            if ($_FILES['image']['image'] <= 50000000) {
                $informationsImage = pathinfo($_FILES['image']['name']);
                $extensionImage = $informationsImage['extension'];
                $extensionArray = array('png', 'jpg', 'jpeg', 'gif');
                if (in_array($extensionImage, $extensionArray)) {
                    $cheminImage = 'public/images/uploads/' . time() . rand() . rand() . '.' . $extensionImage;
                    move_uploaded_file($_FILES['image']['tmp_name'], $cheminImage);
                }
            }
        }

        $id_categorie = filter_var($_POST['id_categorie'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $objectPlatManager = new PlatManager($lePDO);
        $resultat = $objectPlatManager->createPlat($titre, $description, $prix, $cheminImage, $id_categorie);

        if ($resultat) {
            $_SESSION['validation'] = 'Vous avez ajouté votre plat';
            header("location:?path=plat&action=dashboard");
        } else {
            $_SESSION['erreur'] = "L'ajout de votre plat est impossible (vérifiez que votre image ne fasse pas plus de 5 MO)";
            header("location:?path=plat&action=addPlat");
        }
        break;

    case "updatePlat":
        $id = filter_var($_POST['id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $titre = filter_var($_POST['titre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $prix = filter_var($_POST['prix'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $cheminImage = filter_var($_POST['image'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        // $cheminImage = 'public/uploads/' . time() . rand() . rand() . '.';
        $id_categorie = filter_var($_POST['id_categorie'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $objectPlatManager = new PlatManager($lePDO);
        $resultat = $objectPlatManager->updatePlat($id, $titre, $description, $prix, $cheminImage, $id_categorie);

        if ($resultat) {
            $_SESSION['validation'] = 'Vous avez modifié votre plat';
            header("location:?path=plat&action=dashboard");
        } else {
            $_SESSION['erreur'] = 'La modification de votre plat est impossible';
            header("location:?path=plat&action=addPlat");
        }
        break;

    case "processDelete":
        $role = $_SESSION["role"] ?? false;
        if ($role == "admin") {
            $id = filter_var($_POST["id"], FILTER_SANITIZE_NUMBER_INT);
            $objectPlatManager = new PlatManager($lePDO);
            $resultat = $objectPlatManager->deletePlat($id);
            if ($resultat) {
                $_SESSION["validation"] = "Suppression réussie";
                header("location:?path=plat&action=dashboard");
            } else {
                $_SESSION["erreur"] = "Echec de la suppression";
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
