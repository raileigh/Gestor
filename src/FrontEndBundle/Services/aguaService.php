<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class aguaService{

	protected $datos;

	public function __construct(Container $c){

		$this->c = $c;

	}

	public function getDatos($datosPost){

		$em = $this->c->get('doctrine')->getEntityManager();
		$conexion = $em->getConnection();
		$sql = "
		SELECT empresa,concepto,periodo,importe

		FROM gasto

		WHERE tipo = 1

		";

		$filas = $conexion->executeQuery($sql)->fetchAll();
		$cabeceras = array('EMPRESA','CONCEPTO','PERIODO','IMPORTE');


		$this->datos["tablaAgua"]["filas"] = $filas;
		$this->datos["tablaAgua"]["cabeceras"] = $cabeceras;

		$qbGasto =  $em->getConnection();
		$sqlGasto = "

		SELECT Sum(importe) as valor

		FROM gasto

		WHERE tipo = 1  AND periodo BETWEEN '2017-01-01' AND '2017-12-31'

		";


		$gasto = $qbGasto->executeQuery($sqlGasto)->fetchAll()[0];
		$this->datos["gastoAgua"]= $gasto;

		return $this->datos;
	}
	
	public function getTwig(){

		
		return "FrontEndBundle:Default:agua.html.twig";
	}



}