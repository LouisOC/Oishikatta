<?php
session_start();
require("model/bdd.php");
//Chargement automatique des classes (classes métiers et managers)
spl_autoload_register(function ($class_name) {
    if (strstr($class_name, "Manager")) {
        include "model/manager/" . $class_name . ".php";
    } else {
        include "model/class/" . $class_name . '.class.php';
    }
});

$lePDO = etablirCo(); // cela permet d'établir une connexion à la base de données qui est dans bdd.php

$path = filter_var($_GET['path'] ?? "main", FILTER_SANITIZE_FULL_SPECIAL_CHARS);


switch ($path) {
    case "main":
        require('controller/controller.php');
        break;

    case "admin":
        require("controller/adminController.php");
        break;
    case "categorie":
        require("controller/categorieController.php");
        break;
    case "horairesouverture":
        require("controller/horairesouverturesController.php");
        break;
    case "kimono":
        require("controller/kimonoController.php");
        break;
    case "plat":
        require("controller/platController.php");
        break;
    case "reservation":
        require("controller/reservationController.php");
        break;
    default:
        require("view/404.php");
}
