
<?php

$action = filter_var($_GET["action"] ?? "horairesouverture", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

switch ($action) {


    case "info":
        $objectHorairesOuverture = new HorairesOuvertureManager($lePDO);
        $horairesOuverture = $objectHorairesOuverture->fetchAllHorairesOuvertures();

        require("view/info.php");
        break;



    default:
        require("view/404.php");
}
