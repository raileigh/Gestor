<?php

namespace BackEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ingreso
 *
 * @ORM\Table(name="ingreso")
 * @ORM\Entity(repositoryClass="BackEndBundle\Repository\IngresoRepository")
 */
class Ingreso
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
     * @ORM\Column(name="empresa", type="string", length=255)
     */
    private $empresa;

    /**
     * @var string
     *
     * @ORM\Column(name="concepto", type="string", length=255)
     */
    private $concepto;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="periodo", type="date")
     */
    private $periodo;

    /**
     * @var int
     *
     * @ORM\Column(name="importe", type="integer")
     */
    private $importe;

    /**
     * @ORM\ManyToOne(targetEntity="TipoIngreso")
     *
     * @ORM\JoinColumn(name="tipo", referencedColumnName="id")
     */
    private $tipo;


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
     * Set empresa
     *
     * @param string $empresa
     * @return DetalleIngreso
     */
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Get empresa
     *
     * @return string 
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set concepto
     *
     * @param string $concepto
     * @return DetalleIngreso
     */
    public function setConcepto($concepto)
    {
        $this->concepto = $concepto;

        return $this;
    }

    /**
     * Get concepto
     *
     * @return string 
     */
    public function getConcepto()
    {
        return $this->concepto;
    }

    /**
     * Set periodo
     *
     * @param \DateTime $periodo
     * @return DetalleIngreso
     */
    public function setPeriodo($periodo)
    {
        $this->periodo = $periodo;

        return $this;
    }

    /**
     * Get periodo
     *
     * @return \DateTime 
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }

    /**
     * Set importe
     *
     * @param integer $importe
     * @return DetalleIngreso
     */
    public function setImporte($importe)
    {
        $this->importe = $importe;

        return $this;
    }

    /**
     * Get importe
     *
     * @return integer 
     */
    public function getImporte()
    {
        return $this->importe;
    }

    /**
     * Set tipo
     *
     * @param integer $tipo
     * @return DetalleIngreso
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return integer 
     */
    public function getTipo()
    {
        return $this->tipo;
    }
}
