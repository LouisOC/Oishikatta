<?php

class HorairesOuverture
{
    // Id_horaires_ouverture	nom	heure_ouverture	heure_fermeture	
    private $Id_horaires_ouverture;
    private $nom;
    private $heure_ouverture;
    private $heure_fermeture;

    /**
     * Get the value of Id_horaires_ouverture
     */
    public function getIdHorairesOuverture()
    {
        return $this->Id_horaires_ouverture;
    }

    /**
     * Set the value of Id_horaires_ouverture
     *
     * @return  self
     */
    public function setIdHorairesOuverture($Id_horaires_ouverture)
    {
        $this->Id_horaires_ouverture = $Id_horaires_ouverture;

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
     * Get the value of heure_ouverture
     */
    public function getHeureOuverture()
    {
        return $this->heure_ouverture;
    }

    /**
     * Set the value of heure_ouverture
     *
     * @return  self
     */
    public function setHeureOuverture($heure_ouverture)
    {
        $this->heure_ouverture = $heure_ouverture;

        return $this;
    }

    /**
     * Get the value of heure_fermeture
     */
    public function getHeureFermeture()
    {
        return $this->heure_fermeture;
    }

    /**
     * Set the value of heure_fermeture
     *
     * @return  self
     */
    public function setHeureFermeture($heure_fermeture)
    {
        $this->heure_fermeture = $heure_fermeture;

        return $this;
    }
}
