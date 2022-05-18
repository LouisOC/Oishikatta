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
        if ($role == "admin") {
            $id = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);
            $objectKimonoManager = new KimonoManager($lePDO);
            $kimonos = $objectKimonoManager->fetchKimonobyId($id);
            require("view/kimono/kimonoUpdate.php");
        } else {
            require("view/404.php");
            exit;
        }
        break;

    case "addKimono":
        $role = $_SESSION["role"] ?? false;
        if ($role == "admin") {

            require("view/kimono/addKimono.php");
        } else {
            $_SESSION["erreur"] = "Echec d'accès";
            require('view/404.php');
        }
        break;

    case "traitementAjout":
        $titre = filter_var($_POST['titre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
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

        $objectKimonoManager = new KimonoManager($lePDO);
        $resultat = $objectKimonoManager->createKimono($titre, $cheminImage);

        if ($resultat) {
            $_SESSION['validation'] = 'Vous avez ajouté votre kimono';
            header("location:?path=kimono&action=dashboard");
        } else {
            $_SESSION['erreur'] = "L'ajout de votre kimono est impossible (vérifiez que votre image ne fasse pas plus de 5 MO)";
            header("location:?path=kimono&action=addKimono");
        }
        break;

    case "processUpdate":
        $id = filter_var($_POST['id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $titre = filter_var($_POST['titre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $cheminImage = filter_var($_POST['image'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        // $cheminImage = 'public/uploads/' . time() . rand() . rand() . '.';
        $objectKimonoManager = new KimonoManager($lePDO);
        $resultat = $objectKimonoManager->updateKimono($id, $titre, $cheminImage);

        if ($resultat) {
            $_SESSION['validation'] = 'Vous avez modifié votre plat';
            header("location:?path=kimono&action=dashboard");
        } else {
            $_SESSION['erreur'] = 'La modification de votre plat est impossible';
            header("location:?path=kimono&action=addKimono");
        }
        break;


    case "processDelete":
        $role = $_SESSION["role"] ?? false;
        if ($role == "admin") {
            $id = filter_var($_POST["id"], FILTER_SANITIZE_NUMBER_INT);
            $objectKimonoManager = new KimonoManager($lePDO);
            $resultat = $objectKimonoManager->deleteKimono($id);
            if ($resultat) {
                $_SESSION["validation"] = "Suppression réussie";
                header("location:?path=kimono&action=dashboard");
            } else {
                $_SESSION["erreur"] = "Echec de la suppression";
                header("location:?path=kimono&action=dashboard");
            }
        } else {
            require("view/404.php");
            exit;
        }
        break;

    default:
        require("view/404.php");
}
