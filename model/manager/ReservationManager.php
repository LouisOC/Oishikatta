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

    public function fetchReservationbyId($id)
    {

        try {
            $connex = $this->lePDO;
            $sql = $connex->prepare("SELECT * FROM reservation where Id_reservation=:id");
            $sql->bindParam(":id", $id);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, "reservation");
            $resultat = $sql->fetch();
            return $resultat;
        } catch (PDOException $error) {
            echo $error->getMessage();
            return false;
        }
    }

    public function updateReservation($id, $nombre, $email, $nom, $jour, $heure, $tel)
    {
        try {
            $connex = $this->lePDO;
            $sql = $connex->prepare("UPDATE reservation set nombre=:nombre, email=:email,nom=:nom,jour=:jour,heure=:heure,tel=:tel where Id_reservation=:id");
            $sql->bindParam(":nombre", $nombre);
            $sql->bindParam(":email", $email);
            $sql->bindParam(":nom", $nom);
            $sql->bindParam(":jour", $jour);
            $sql->bindParam(":heure", $heure);
            $sql->bindParam(":tel", $tel);
            $sql->bindParam(":id", $id);
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

    function deleteReservation($idReservation)
    {
        try {
            $connex = $this->lePDO;
            $sql = $connex->prepare("DELETE FROM reservation WHERE Id_reservation=:id");
            $sql->bindParam(":id", $idReservation);
            $sql->execute();
            return true;
        } catch (PDOException $error) {
            echo $error->getMessage();
            return false;
        }
    }
}
