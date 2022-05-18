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

    public function createJour($nom, $heureOuverture, $heureFermeture)
    {
        try {
            $connex = $this->lePDO;
            $sql = $connex->prepare("INSERT INTO horaires_ouverture values(null,:nom,:heureOuverture,:heureFermeture)");
            $sql->bindParam(":nom", $nom);
            $sql->bindParam(":heureOuverture", $heureOuverture);
            $sql->bindParam(":heureFermeture", $heureFermeture);
            $sql->execute();
            return true;
        } catch (PDOException $error) {
            echo $error->getMessage();
            return false;
        }
    }

    public function fetchJourbyId($id)
    {

        try {
            $connex = $this->lePDO;
            $sql = $connex->prepare("SELECT * FROM horaires_ouverture where Id_horaires_ouverture=:id");
            $sql->bindParam(":id", $id);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, "horairesOuverture");
            $resultat = $sql->fetch();
            return $resultat;
        } catch (PDOException $error) {
            echo $error->getMessage();
            return false;
        }
    }


    public function updateJour($id, $nom, $heureOuverture, $heureFermeture)
    {
        try {
            $connex = $this->lePDO;
            $sql = $connex->prepare("UPDATE horaires_ouverture set nom=:nom, heure_Ouverture=:heure_Ouverture,heure_Fermeture=:heure_Fermeture where Id_horaires_ouverture=:id");
            $sql->bindParam(":nom", $nom);
            $sql->bindParam(":heure_Ouverture", $heureOuverture);
            $sql->bindParam(":heure_Fermeture", $heureFermeture);
            $sql->bindParam(":id", $id);
            $sql->execute();
            return true;
        } catch (PDOException $error) {
            echo $error->getMessage();
            return false;
        }
    }
    public function deleteJour($id)
    {
        try {
            $connex = $this->lePDO;
            $sql = $connex->prepare("DELETE FROM horaires_ouverture WHERE Id_horaires_ouverture=:id");
            $sql->bindParam(":id", $id);
            $sql->execute();
            return true;
        } catch (PDOException $error) {
            echo $error->getMessage();
            return false;
        }
    }
}
