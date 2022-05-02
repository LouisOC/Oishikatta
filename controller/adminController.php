<?php

$action = filter_var($_GET["action"] ?? "admin", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

switch ($action) {

    case "adminLogin":
        require("view/admin/adminLogin.php");
        break;

    case "traitementLogin":
        $email = filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $objetAdminManager = new AdminManager($lePDO);
        $admin = $objetAdminManager->fetchAdminByEmailAndMdp($email, $password);
        if (empty($admin)) {
            $_SESSION['erreur'] = [];
            array_push($_SESSION['erreur'], "Erreur de connexion !");
            header("location:./?path=admin&action=adminLogin");
        } else {
            $_SESSION["email"] = $admin->getEmail();
            $_SESSION["id"] = $admin->getIdAdmin();
            $_SESSION["role"] = "admin";
            header("location:./");
        }
        break;

    case "logout":
        session_unset();
        session_destroy();
        header("location:./?path=main&action=home");
        break;

    case "addAdmin":
        $role = $_SESSION["role"] ?? false;
        if ($role == "admin") {
            require("view/admin/addAdmin.php");
        } else {
            $_SESSION["error"] = "Echec d'accès";
            require('view/404.php');
        }
        break;
    case "traitementInscription":
        $role = $_SESSION["role"] ?? false;
        if ($role == "admin") {
            $nom = filter_var($_POST["nom"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_var($_POST["email"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password  = filter_var($_POST["mdp1"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password2 = filter_var($_POST["mdp2"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if ($password != $password2) {
                $_SESSION["erreur"] = ["Vérifier votre mot de passe"];
                exit;
            }

            $objetAdminManager = new AdminManager($lePDO);
            $resultat = $objetAdminManager->createAdmin($nom, $email, $password);
            if ($resultat == true) {

                $_SESSION["validation"] = ["Ajout d'un admin réussi !"];
                header("location:?path=admin&action=dashboard");
            } else {
                $_SESSION["erreur"] = ["Echec de l'ajout"];
                header("location:?path=admin&action=formAdd");
            }
        } else {
            $_SESSION["erreur"] = "Echec d'accès";
            require('view/404.php');
        }
        break;

    case "dashboard":
        $role = $_SESSION["role"] ?? false;
        if ($role == "admin") {
            $objetAdminManager = new AdminManager($lePDO);
            $admins = $objetAdminManager->fetchallAdmin();
            require("view/admin/dashboard.php");
        } else {
            $_SESSION["error"] = "Echec d'accès";
            require('view/404.php');
        }
        break;

    case "formUpdate":
        $role = $_SESSION["role"] ?? false;
        if ($role == "admin" || $role == "superAdmin") {
            $id = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);
            $objectAdminManager = new AdminManager($lePDO);
            $admins = $objectAdminManager->fetchAdminbyId($id);
            require("view/admin/adminUpdate.php");
        } else {
            require("view/404.php");
            exit;
        }
        break;

    case "processUpdate":
        $role = $_SESSION["role"] ?? false;
        if ($role == "superAdmin" || $role == "admin") {
            $id = filter_var($_POST["id"], FILTER_SANITIZE_NUMBER_INT);
            $nom = filter_var($_POST["nom"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_var($_POST["email"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password  = filter_var($_POST["mdp1"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password2 = filter_var($_POST["mdp2"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if ($password != $password2) {
                $_SESSION["error"] = "Vérifier votre mot de passe";
                exit;
            }
            $objectAdminManager = new AdminManager($lePDO);
            $admins = $objectAdminManager->updateAdmin($id, $nom, $email, $password);
            if ($admins) {
                $_SESSION["validation"] = ["Mise à jour réussie"];
                header("location:?path=admin&action=dashboard");
            } else {
                $_SESSION["erreur"] = ["Echec de la mise à jour"];
                header("location:?path=admin&action=formUpdate&id=$id");
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
            $objectAdminManager = new AdminManager($lePDO);
            $resultat = $objectAdminManager->deleteAdmin($id);
            if ($resultat) {
                $_SESSION["validation"] = ["Suppression réussie"];
                header("location:?path=admin&action=dashboard");
            } else {
                $_SESSION["erreur"] = ["Echec de la suppression"];
                header("location:?path=admin&action=dashboard");
            }
        } else {
            require("view/404.php");
            exit;
        }
        break;


    default:
        require("view/404.php");
}
