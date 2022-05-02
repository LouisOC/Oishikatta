<?php

class CategorieManager
{
    private $lePDO;

    public function __construct($unPDO)
    {
        $this->lePDO = $unPDO;
    }

    function fetchAllCategories()
    {

        try {
            //Pour la co on utilise l'attribut lePDO
            $connex = $this->lePDO;
            $sql = $connex->prepare("SELECT * FROM categorie ORDER BY id_categorie");
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, "categorie");
            $resultat = ($sql->fetchAll());
            return $resultat;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function fetchAllCategoriebyId($unId)
    {
        try {
            $connex = $this->lePDO;
            $sql = $connex->prepare("SELECT *
            FROM categorie 
            where id_categorie=:id");
            $sql->bindParam(":id", $unId);
            $sql->execute();
            //Definir le mode de recuperation des données         
            $sql->setFetchMode(PDO::FETCH_CLASS, "categorie");
            $resultat = $sql->fetchAll();
            return $resultat;
        } catch (PDOException $error) {
            echo $error->getMessage();
            return false;
        }
    }

    public function fetchTitrebyID($unId)
    {
        try {
            $connex = $this->lePDO;
            $sql = $connex->prepare("SELECT titre FROM categorie WHERE id_categorie=:id");
            $sql->bindParam(":id", $unId);
            $sql->execute();
            //Definir le mode de recuperation des données         
            $sql->setFetchMode(PDO::FETCH_CLASS, "categorie");
            $resultat = $sql->fetch();
            return $resultat;
        } catch (PDOException $error) {
            echo $error->getMessage();
            return false;
        }
    }
}
