<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class horarioService{

	protected $datos;

	public function __construct(Container $c){

		
		$this->c = $c;

	}

	public function getDatos($datosPost){

		$em = $this->c->get('doctrine')->getEntityManager();
		$conexion = $em->getConnection();
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

		return $this->datos;

	}
	
	public function getTwig(){

		return "FrontEndBundle:Default:horario.html.twig";
	}

}