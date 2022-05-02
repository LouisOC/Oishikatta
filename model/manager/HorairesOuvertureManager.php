<?php

class HorairesOuvertureManager
{
    private $lePDO;

    public function __construct($unPDO)
    {
        $this->lePDO = $unPDO;
    }

    function fetchAllHorairesOuvertures()
    {

        try {
            //Pour la co on utilise l'attribut lePDO
            $connex = $this->lePDO;
            $sql = $connex->prepare("SELECT * FROM horaires_ouverture");
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, "HorairesOuverture");
            $resultat = ($sql->fetchAll());
            return $resultat;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }
}
