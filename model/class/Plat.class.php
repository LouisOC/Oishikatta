<!-- id_plat	titre	description	prix	image_plat	id_categorie	 -->
<?php
class Plat
{
    private $id_plat;
    private $titre;
    private $description;
    private $prix;
    private $image_plat;
    private $id_categorie;

    /**
     * Get the value of id_plat
     */
    public function getIdPlat()
    {
        return $this->id_plat;
    }

    /**
     * Set the value of id_plat
     *
     * @return  self
     */
    public function setIdPlat($id_plat)
    {
        $this->id_plat = $id_plat;

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

    /**
     * Get the value of prix
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get the value of image_plat
     */
    public function getImagePlat()
    {
        return $this->image_plat;
    }

    /**
     * Set the value of image_plat
     *
     * @return  self
     */
    public function setImagePlat($image_plat)
    {
        $this->image_plat = $image_plat;

        return $this;
    }

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
}
