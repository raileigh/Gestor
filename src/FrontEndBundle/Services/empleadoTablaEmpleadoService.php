<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;


class empleadoTablaEmpleadoService{

	 

	public function __construct(Session $s, EntityManager $em){

		$this->em = $em;
		$this->s = $s;

	}

	public function getDatos(){

		$conexion = $this->em->getConnection();
		$sql = "
		SELECT nombre,apellidos,telefono,direccion,dni,salario

		FROM empleado

		";

		$filas = $conexion->executeQuery($sql)->fetchAll();
		$cabeceras = array('NOMBRE','APELLIDOS','TELÉFONO','DIRECCIÓN','DNI','SALARIO');


		return array('filas' => $filas, 'cabeceras' => $cabeceras);
	}
	

}