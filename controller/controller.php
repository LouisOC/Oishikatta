<?php

$action = filter_var($_GET["action"] ?? "home", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

switch ($action) {
    case "home":
        require('view/home.php');
        break;

    case "concept":
        require("view/concept.php");
        break;


    case "contact":
        require("view/contact.php");
        break;


    default:
        require('view/404.php');
}
