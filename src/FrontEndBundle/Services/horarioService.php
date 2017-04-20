<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class horarioService{

	protected $datos;

	public function __construct(EntityManager $em){

		$this->em = $em;

	}

	public function getDatos($datosPost = null,$ajax = false){

		$conexion = $this->em->getConnection();
		$sql = "
		SELECT c.hora,tc.nombre as clase,c.profesor

		FROM clase c

		INNER JOIN tipo tc ON c.tipo = tc.id

		WHERE tipo

		";

		$filas = $conexion->executeQuery($sql)->fetchAll();
		$cabeceras = array('HORA','CLASE','PROFESOR');


		$this->datos["tablaClase"]["filas"] = $filas;
		$this->datos["tablaClase"]["cabeceras"] = $cabeceras;

		$this->datos = $ajax ? json_encode($this->datos) : $this->datos;

		return $this->datos;

	}
	
	public function getTwig(){

		return "FrontEndBundle:Default:horario.html.twig";
	}

}