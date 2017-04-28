<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;


class aguaTablaAguaService{

	 

	public function __construct(Session $s, EntityManager $em){

		$this->em = $em;
		$this->s = $s;

	}

	public function getDatos(){

		$conexion = $this->em->getConnection();
		$sql = "
		SELECT empresa,concepto,periodo,importe

		FROM gasto

		WHERE tipo = 1

		";

		$filas = $conexion->executeQuery($sql)->fetchAll();
		$cabeceras = array('EMPRESA','CONCEPTO','PERIODO','IMPORTE');


		return array('filas' => $filas, 'cabeceras' => $cabeceras);
	}
	

}