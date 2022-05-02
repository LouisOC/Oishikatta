<?php

class PlatManager
{
    private $lePDO;

    public function __construct($unPDO)
    {
        $this->lePDO = $unPDO;
    }

    public function fetchAllPlatbyIdCategorie($unId)
    {
        try {
            $connex = $this->lePDO;
            $sql = $connex->prepare("SELECT * FROM plat WHERE id_categorie=:id");
            $sql->bindParam(":id", $unId);
            $sql->execute();
            //Definir le mode de recuperation des données         
            $sql->setFetchMode(PDO::FETCH_CLASS, "plat");
            $resultat = $sql->fetchAll();
            return $resultat;
        } catch (PDOException $error) {
            echo $error->getMessage();
            return false;
        }
    }

    public function fetchAllPlat()
    {
        try {
            $connex = $this->lePDO;
            $sql = $connex->prepare("SELECT * FROM plat");
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, "plat");
            $resultat = $sql->fetchAll();
            return $resultat;
        } catch (PDOException $error) {
            echo $error->getMessage();
            return false;
        }
    }

    public function createPlat($titre, $description, $prix, $image_plat, $id_categorie)
    {
        try {
            $connex = $this->lePDO;
            $sql = $connex->prepare("INSERT INTO plat values(null,:titre,:description,:prix,:image_plat,:id_categorie)");
            $sql->bindParam(":titre", $titre);
            $sql->bindParam(":description", $description);
            $sql->bindParam(":prix", $prix);
            $sql->bindParam(":image_plat", $image_plat);
            $sql->bindParam(":id_categorie", $id_categorie);
            $sql->execute();
            return true;
        } catch (PDOException $error) {
            echo $error->getMessage();
            return false;
        }
    }

    public function deletePlat($id)
    {
        try {
            $connex = $this->lePDO;
            $sql = $connex->prepare("DELETE FROM plat WHERE id_plat=:id");
            $sql->bindParam(":id", $id);
            $sql->execute();
            return true;
        } catch (PDOException $error) {
            echo $error->getMessage();
            return false;
        }
    }
}
