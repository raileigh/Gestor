<?php

namespace BackEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Widget
 *
 * @ORM\Table(name="widget")
 * @ORM\Entity(repositoryClass="BackEndBundle\Repository\WidgetRepository")
 */
class Widget
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
     * @ORM\Column(name="vista", type="string", length=255)
     */
    private $vista;

    /**
     * @var string
     *
     * @ORM\Column(name="widget", type="string", length=255, unique=true)
     */
    private $widget;


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
     * Set vista
     *
     * @param string $vista
     * @return Widget
     */
    public function setVista($vista)
    {
        $this->vista = $vista;

        return $this;
    }

    /**
     * Get vista
     *
     * @return string 
     */
    public function getVista()
    {
        return $this->vista;
    }

    /**
     * Set widget
     *
     * @param string $widget
     * @return Widget
     */
    public function setWidget($widget)
    {
        $this->widget = $widget;

        return $this;
    }

    /**
     * Get widget
     *
     * @return string 
     */
    public function getWidget()
    {
        return $this->widget;
    }
}
