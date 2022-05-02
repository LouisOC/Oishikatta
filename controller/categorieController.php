<?php

$action = filter_var($_GET["action"] ?? "categorie", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

switch ($action) {

    case "menu":

        $objectCategorie = new CategorieManager($lePDO);
        $categories = $objectCategorie->fetchAllCategories();

        require("view/menu.php");
        break;


    default:
        require("view/404.php");
}
