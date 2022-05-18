
<?php

$action = filter_var($_GET["action"] ?? "horairesouverture", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

switch ($action) {


    case "info":
        $objectHorairesOuverture = new HorairesOuvertureManager($lePDO);
        $horairesOuverture = $objectHorairesOuverture->fetchAllHorairesOuvertures();

        require("view/info.php");
        break;

    case "dashboard":
        $role = $_SESSION["role"] ?? false;
        if ($role == "admin") {
            $objetHorairesouverture = new HorairesOuvertureManager($lePDO);
            $horairesouvertures = $objetHorairesouverture->fetchAllHorairesOuvertures();
            require("view/horairesouverture/dashboard.php");
        } else {
            $_SESSION["erreur"] = "Echec d'accès";
            require('view/404.php');
        }
        break;

    case "addJour":
        $role = $_SESSION["role"] ?? false;
        if ($role == "admin") {
            require("view/horairesouverture/addJour.php");
        } else {
            $_SESSION["erreur"] = "Echec d'accès";
            require('view/404.php');
        }
        break;

    case "traitementAjout":
        $role = $_SESSION["role"] ?? false;
        if ($role == "admin") {
            $jour = filter_var($_POST["jour"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $heureOuverture = filter_var($_POST["heureOuverture"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $heureFermeture = filter_var($_POST["heureFermeture"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $objetHorairesouverture = new HorairesOuvertureManager($lePDO);
            $resultat = $objetHorairesouverture->createJour($jour, $heureOuverture, $heureFermeture);
            if ($resultat) {
                $_SESSION["validation"] = "Ajout d'un jour réussi";
                header("location:?path=horairesouverture&action=dashboard");
            } else {
                $_SESSION["erreur"] = "Echec de l'ajout";
                header("location:?path=horairesouverture&action=dashboard");
            }
        } else {
            require("view/404.php");
            exit;
        }
        break;

    case "jourUpdate":
        $role = $_SESSION["role"] ?? false;
        if ($role == "admin") {
            $id = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);
            $objectHorairesouverture = new HorairesOuvertureManager($lePDO);
            $jours = $objectHorairesouverture->fetchJourbyId($id);
            require("view/horairesouverture/jourUpdate.php");
        } else {
            $_SESSION["erreur"] = "Echec d'accès";
            require('view/404.php');
        }
        break;

    case "processUpdate":
        $role = $_SESSION["role"] ?? false;
        if ($role == "admin") {
            $id = filter_var($_POST["id"], FILTER_SANITIZE_NUMBER_INT);
            $nom = filter_var($_POST["jour"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $heure_Ouverture = filter_var($_POST["heure_Ouverture"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $heure_Fermeture = filter_var($_POST["heure_Fermeture"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $objectHorairesouverture = new HorairesOuvertureManager($lePDO);
            $jours = $objectHorairesouverture->updateJour($id, $nom, $heure_Ouverture, $heure_Fermeture);
            if ($jours) {
                $_SESSION["validation"] = "Modification d'un jour réussi";
                header("location:?path=horairesouverture&action=dashboard");
            } else {
                $_SESSION["erreur"] = "Echec de la modification";
                header("location:?path=horairesouverture&action=dashboard");
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
            $objectHorairesouvertureManager = new HorairesOuvertureManager($lePDO);
            $resultat = $objectHorairesouvertureManager->deleteJour($id);
            if ($resultat) {
                $_SESSION["validation"] = "Suppression réussie";
                header("location:?path=horairesouverture&action=dashboard");
            } else {
                $_SESSION["erreur"] = "Echec de la suppression";
                header("location:?path=horairesouverture&action=dashboard");
            }
        } else {
            require("view/404.php");
            exit;
        }
        break;


    default:
        require("view/404.php");
}
