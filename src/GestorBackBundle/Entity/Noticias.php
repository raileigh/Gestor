<?php

namespace GestorBackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Noticias
 *
 * @ORM\Table(name="noticias")
 * @ORM\Entity(repositoryClass="GestorBackBundle\Repository\NoticiasRepository")
 */
class Noticias
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="noticia", type="string", length=255)
     */
    private $noticia;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Noticias
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set noticia
     *
     * @param string $noticia
     * @return Noticias
     */
    public function setNoticia($noticia)
    {
        $this->noticia = $noticia;

        return $this;
    }

    /**
     * Get noticia
     *
     * @return string 
     */
    public function getNoticia()
    {
        return $this->noticia;
    }
}
