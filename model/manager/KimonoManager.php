<?php

class KimonoManager
{
    private $lePDO;

    public function __construct($unPDO)
    {
        $this->lePDO = $unPDO;
    }

    function fetchAllKimonos()
    {

        try {
            //Pour la co on utilise l'attribut lePDO
            $connex = $this->lePDO;
            $sql = $connex->prepare("SELECT * FROM kimono ORDER BY id_kimono");
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, "kimono");
            $resultat = ($sql->fetchAll());
            return $resultat;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function fetchKimonobyId($id)
    {

        try {
            $connex = $this->lePDO;
            $sql = $connex->prepare("SELECT * FROM kimono where id_kimono=:id");
            $sql->bindParam(":id", $id);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, "kimono");
            $resultat = $sql->fetch();
            return $resultat;
        } catch (PDOException $error) {
            echo $error->getMessage();
            return false;
        }
    }
}
