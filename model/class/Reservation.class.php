<?php

class Reservation
{
    // Id_reservation	number	email	nom	tel	
    private $Id_reservation;
    private $nombre;
    private $email;
    private $nom;
    private $jour;
    private $heure;
    private $tel;

    /**
     * Get the value of Id_reservation
     */
    public function getIdReservation()
    {
        return $this->Id_reservation;
    }

    /**
     * Set the value of Id_reservation
     *
     * @return  self
     */
    public function setIdReservation($Id_reservation)
    {
        $this->Id_reservation = $Id_reservation;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of tel
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set the value of tel
     *
     * @return  self
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get the value of jour
     */
    public function getJour()
    {
        return $this->jour;
    }

    /**
     * Set the value of jour
     *
     * @return  self
     */
    public function setJour($jour)
    {
        $this->jour = $jour;

        return $this;
    }

    /**
     * Get the value of heure
     */
    public function getHeure()
    {
        return $this->heure;
    }

    /**
     * Set the value of heure
     *
     * @return  self
     */
    public function setHeure($heure)
    {
        $this->heure = $heure;

        return $this;
    }
}
