<?php

class Categorie
{
    private $id_categorie;
    private $titre;
    private $nom_image;
    private $description;

    /**
     * Get the value of id_categorie
     */
    public function getIdCategorie()
    {
        return $this->id_categorie;
    }

    /**
     * Set the value of id_categorie
     *
     * @return  self
     */
    public function setIdCategorie($id_categorie)
    {
        $this->id_categorie = $id_categorie;

        return $this;
    }

    /**
     * Get the value of titre
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of nom_image
     */
    public function getNomImage()
    {
        return $this->nom_image;
    }

    /**
     * Set the value of nom_image
     *
     * @return  self
     */
    public function setNomImage($nom_image)
    {
        $this->nom_image = $nom_image;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
}
