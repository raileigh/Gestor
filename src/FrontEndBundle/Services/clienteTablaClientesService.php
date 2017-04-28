<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;


class clienteTablaClientesService{

	 

	public function __construct(Session $s, EntityManager $em){

		$this->em = $em;
		$this->s = $s;

	}

	public function getDatos(){

		$conexion = $this->em->getConnection();
		$sql = "
		SELECT nombre,apellidos,telefono,direccion,dni

		FROM cliente

		";

		$filas = $conexion->executeQuery($sql)->fetchAll();
		$cabeceras = array('NOMBRE','APELLIDOS','TELÉFONO','DIRECCIÓN','DNI');


		return array('filas' => $filas, 'cabeceras' => $cabeceras);
	}
	

}