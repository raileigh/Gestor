<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;


class horarioTablaHorarioService{

	 

	public function __construct(Session $s, EntityManager $em){

		$this->em = $em;
		$this->s = $s;

	}

	public function getDatos(){

		$conexion = $this->em->getConnection();
		$sql = "
		SELECT c.hora,tc.nombre as clase,c.profesor

		FROM clase c

		INNER JOIN tipo tc ON c.tipo = tc.id

		WHERE tipo

		";

		$filas = $conexion->executeQuery($sql)->fetchAll();
		$cabeceras = array('HORA','CLASE','PROFESOR');

		return array('filas' => $filas, 'cabeceras' => $cabeceras);
	}
	

}