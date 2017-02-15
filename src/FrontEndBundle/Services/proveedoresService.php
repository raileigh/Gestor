<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class proveedoresService{

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

				WHERE tipo=3

				";

		$resultado = $conexion->executeQuery($sql)->fetchAll();


     	$this->datos["gastosProveedor"] = $resultado;


		return $this->datos;
	}
	
public function getTwig(){

		
		return "FrontEndBundle:Default:proveedores.html.twig";
	}



}