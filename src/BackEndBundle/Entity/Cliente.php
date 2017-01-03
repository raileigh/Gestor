<?php

namespace BackEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cliente
 *
 * @ORM\Table(name="cliente")
 * @ORM\Entity(repositoryClass="BackEndBundle\Repository\ClienteRepository")
 */
class Cliente
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
     * @ORM\Column(name="nombre", type="string", length=255)
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
     * @ORM\Column(name="dni", type="string", length=255, unique=true)
     */
    private $dni;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_alta", type="datetime")
     */
    private $fechaAlta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_baja", type="datetime")
     */
    private $fechaBaja;

    /**
     * @var string
     *
     * @ORM\Column(name="bonos", type="string", length=255)
     */
    private $bonos;

    /**
     * @var string
     *
     * @ORM\Column(name="ofertas", type="string", length=255)
     */
    private $ofertas;

    /**
     * @var string
     *
     * @ORM\Column(name="rutinas", type="string", length=255)
     */
    private $rutinas;


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
     * @return Cliente
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
     * @return Cliente
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
     * Set dni
     *
     * @param string $dni
     * @return Cliente
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return string 
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set fechaAlta
     *
     * @param \DateTime $fechaAlta
     * @return Cliente
     */
    public function setFechaAlta($fechaAlta)
    {
        $this->fechaAlta = $fechaAlta;

        return $this;
    }

    /**
     * Get fechaAlta
     *
     * @return \DateTime 
     */
    public function getFechaAlta()
    {
        return $this->fechaAlta;
    }

    /**
     * Set fechaBaja
     *
     * @param \DateTime $fechaBaja
     * @return Cliente
     */
    public function setFechaBaja($fechaBaja)
    {
        $this->fechaBaja = $fechaBaja;

        return $this;
    }

    /**
     * Get fechaBaja
     *
     * @return \DateTime 
     */
    public function getFechaBaja()
    {
        return $this->fechaBaja;
    }

    /**
     * Set bonos
     *
     * @param string $bonos
     * @return Cliente
     */
    public function setBonos($bonos)
    {
        $this->bonos = $bonos;

        return $this;
    }

    /**
     * Get bonos
     *
     * @return string 
     */
    public function getBonos()
    {
        return $this->bonos;
    }

    /**
     * Set ofertas
     *
     * @param string $ofertas
     * @return Cliente
     */
    public function setOfertas($ofertas)
    {
        $this->ofertas = $ofertas;

        return $this;
    }

    /**
     * Get ofertas
     *
     * @return string 
     */
    public function getOfertas()
    {
        return $this->ofertas;
    }

    /**
     * Set rutinas
     *
     * @param string $rutinas
     * @return Cliente
     */
    public function setRutinas($rutinas)
    {
        $this->rutinas = $rutinas;

        return $this;
    }

    /**
     * Get rutinas
     *
     * @return string 
     */
    public function getRutinas()
    {
        return $this->rutinas;
    }
}
