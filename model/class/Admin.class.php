<?php

class Admin
{
    private $id_admin;
    private $nom;
    private $email;
    private $password;

    /**
     * Get the value of id_admin
     */
    public function getIdAdmin()
    {
        return $this->id_admin;
    }

    /**
     * Set the value of id_admin
     *
     * @return  self
     */
    public function setIdAdmin($id_admin)
    {
        $this->id_admin = $id_admin;

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
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}
