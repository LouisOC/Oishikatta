<?php
class ReservationManager
{

    private $lePDO;

    public function __construct($unPDO)
    {
        $this->lePDO = $unPDO;
    }

    public function createReservation($nombre, $email, $nom, $jour, $heure, $tel)
    {
        try {
            $connex = $this->lePDO;
            $sql = $connex->prepare("INSERT INTO reservation values(null,:nombre,:email,:nom,:jour,:heure,:tel)");
            $sql->bindParam(":nombre", $nombre);
            $sql->bindParam(":email", $email);
            $sql->bindParam(":nom", $nom);
            $sql->bindParam(":jour", $jour);
            $sql->bindParam(":heure", $heure);
            $sql->bindParam(":tel", $tel);
            $sql->execute();
            return true;
        } catch (PDOException $error) {
            echo $error->getMessage();
            return false;
        }
    }

    function fetchAllReservation()
    {

        try {
            //Pour la co on utilise l'attribut lePDO
            $connex = $this->lePDO;
            $sql = $connex->prepare("SELECT * FROM reservation");
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, "Reservation");
            $resultat = ($sql->fetchAll());
            return $resultat;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }
}
