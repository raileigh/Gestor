<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;



class widgetsVistaService{

	protected $listadoServicesWidgets

	public function __construct(Session $s, EntityManager $em){

		$this->em = $em;
		$this->s = $s;

	}

	public function getListadoWidgets($slug){

		
        $conexion = $em->getConnection();
        $sql = "
        SELECT widget

        FROM widget

        WHERE vista = '".$slug."'

        ";

        $widgets = $conexion->executeQuery($sql)->fetchAll();

        return $widgets;

		
	}

	public function setListadoServicesWidgets($listado){

		$this->listadoServicesWidgets = $listado;

		
	}

	public function getListadoServicesWidgets(){

		return $this->listadoServicesWidgets;

		
	}


}