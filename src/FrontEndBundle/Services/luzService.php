<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class luzService{

	protected $datos;

	public function __construct(Container $c){

		
		$this->c = $c;

	}

	public function getDatos(){

		$emr = $this->c->get('doctrine')->getEntityManager();
		$conexion = $emr->getConnection();
		$sql = "
				SELECT *

				FROM gasto

				WHERE tipo=2

				";

		$resultado = $conexion->executeQuery($sql)->fetchAll();


     	$this->datos["gastosLuz"] = $resultado;


		return $this->datos;
	}
	
public function getTwig(){

		
		return "FrontEndBundle:Default:luz.html.twig";
	}



}