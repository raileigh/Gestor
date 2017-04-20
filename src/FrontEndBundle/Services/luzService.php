<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class luzService{

	protected $datos;

	public function __construct(EntityManager $em){

		$this->em = $em;

	}

	public function getDatos($datosPost){

		$conexion = $this->em->getConnection();
		$sql = "
		SELECT empresa,concepto,periodo,importe

		FROM gasto

		WHERE tipo = 2

		";

		$filas = $conexion->executeQuery($sql)->fetchAll();
		$cabeceras = array('EMPRESA','CONCEPTO','PERIODO','IMPORTE');


		$this->datos["tablaLuz"]["filas"] = $filas;
		$this->datos["tablaLuz"]["cabeceras"] = $cabeceras;

		$qbGasto =  $this->em->getConnection();
		$sqlGasto = "

		SELECT Sum(importe) as valor

		FROM gasto

		WHERE tipo = 2  AND periodo BETWEEN '2017-01-01' AND '2017-12-31'

		

		";


		$gasto = $qbGasto->executeQuery($sqlGasto)->fetchAll()[0];
		$this->datos["gastoLuz"]= $gasto;


		return $this->datos;
	}
	
	public function getTwig(){

		
		return "FrontEndBundle:Default:luz.html.twig";
	}

}