<?php
class AdminManager
{

    private $lePDO;

    public function __construct($unPDO)
    {
        $this->lePDO = $unPDO;
    }

    public function fetchAdminByEmailAndMdp($email, $hashMdp)
    {
        try {


            $connex = $this->lePDO;
            $sql = $connex->prepare("SELECT * FROM admin where email=:email and password=:password");

            $sql->bindParam(":email", $email);
            $sql->bindParam(":password", $hashMdp);
            $sql->execute();

            $sql->setFetchMode(PDO::FETCH_CLASS, "Admin");
            $resultat = $sql->fetch();
            return $resultat;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function createAdmin($nom, $email, $password)
    {
        try {
            $connex = $this->lePDO;
            $sql = $connex->prepare("INSERT INTO admin values(null,:nom,:email,:password)");
            $sql->bindParam(":nom", $nom);
            $sql->bindParam(":email", $email);
            $sql->bindParam(":password", $password);
            $sql->execute();
            return true;
        } catch (PDOException $error) {
            echo $error->getMessage();
            return false;
        }
    }

    public function fetchallAdmin()
    {

        try {
            $connex = $this->lePDO;
            $sql = $connex->prepare("SELECT * FROM admin");
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, "admin");
            $resultat = $sql->fetchAll();
            return $resultat;
        } catch (PDOException $error) {
            echo $error->getMessage();
            return false;
        }
    }
    public function fetchAdminbyId($id)
    {

        try {
            $connex = $this->lePDO;
            $sql = $connex->prepare("SELECT * FROM admin where id_admin=:id");
            $sql->bindParam(":id", $id);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, "admin");
            $resultat = $sql->fetch();
            return $resultat;
        } catch (PDOException $error) {
            echo $error->getMessage();
            return false;
        }
    }

    public function updateAdmin($id, $nom, $email, $password)
    {
        try {
            $connex = $this->lePDO;
            $sql = $connex->prepare("UPDATE admin set nom=:nom, email=:email, password=:password where id_admin=:id");
            $sql->bindParam(":nom", $nom);
            $sql->bindParam(":email", $email);
            $sql->bindParam(":password", $password);
            $sql->bindParam(":id", $id);
            $sql->execute();
            return true;
        } catch (PDOException $error) {
            echo $error->getMessage();
            return false;
        }
    }

    public function deleteAdmin($idAdmin)
    {
        try {
            $connex = $this->lePDO;
            $sql = $connex->prepare("DELETE FROM admin WHERE id_admin=:id");
            $sql->bindParam(":id", $idAdmin);
            $sql->execute();
            return true;
        } catch (PDOException $error) {
            echo $error->getMessage();
            return false;
        }
    }
}
