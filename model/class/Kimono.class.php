<?php

class Kimono
{
    private $id_kimono;
    private $titre;
    private $image_kimono;

    /**
     * Get the value of id_kimono
     */
    public function getIdKimono()
    {
        return $this->id_kimono;
    }

    /**
     * Set the value of id_kimono
     *
     * @return  self
     */
    public function setIdKimono($id_kimono)
    {
        $this->id_kimono = $id_kimono;

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
     * Get the value of image_kimono
     */
    public function getImageKimono()
    {
        return $this->image_kimono;
    }

    /**
     * Set the value of image_kimono
     *
     * @return  self
     */
    public function setImageKimono($image_kimono)
    {
        $this->image_kimono = $image_kimono;

        return $this;
    }
}
