<?php

namespace GestorBackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rutina
 *
 * @ORM\Table(name="rutina")
 * @ORM\Entity(repositoryClass="GestorBackBundle\Repository\RutinaRepository")
 */
class Rutina
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
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, unique=true)
     */
    private $nombre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="ejercicios", type="string", length=255)
     */
    private $ejercicios;


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
     * Set nombre
     *
     * @param string $nombre
     * @return Rutina
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Rutina
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
     * Set ejercicios
     *
     * @param string $ejercicios
     * @return Rutina
     */
    public function setEjercicios($ejercicios)
    {
        $this->ejercicios = $ejercicios;

        return $this;
    }

    /**
     * Get ejercicios
     *
     * @return string 
     */
    public function getEjercicios()
    {
        return $this->ejercicios;
    }
}
