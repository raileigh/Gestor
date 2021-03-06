<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class empleadoService{

	protected $datos;

	public function __construct(Container $c){

		
		$this->c = $c;

	}

	public function getDatos($datosPost){

		$em = $this->c->get('doctrine')->getEntityManager();
		$conexion = $em->getConnection();
		$sql = "
		SELECT nombre,apellidos,telefono,direccion,dni,salario

		FROM empleado

		";

		$filas = $conexion->executeQuery($sql)->fetchAll();
		$cabeceras = array('NOMBRE','APELLIDOS','TELÉFONO','DIRECCIÓN','DNI','SALARIO');


		$this->datos["tablaEmpleados"]["filas"] = $filas;
		$this->datos["tablaEmpleados"]["cabeceras"] = $cabeceras;

		$qbBaja =  $em->getConnection();
		$sqlBaja = "

		SELECT Count(status) as valor

		FROM empleado

		WHERE status = 1

		";


		$baja = $qbBaja->executeQuery($sqlBaja)->fetchAll()[0];
		$this->datos["bajaEmpleados"]= $baja;

		$qbAlta =  $em->getConnection();
		$sqlAlta = "

		SELECT Count(status) as valor

		FROM empleado

		WHERE status = 2

		";


		$alta = $qbAlta->executeQuery($sqlAlta)->fetchAll()[0];
		$this->datos["altaEmpleados"]= $alta;


		$qbVacaciones =  $em->getConnection();
		$sqlVacaciones = "

		SELECT Count(status) as valor

		FROM empleado

		WHERE status = 3

		";


		$vacaciones = $qbVacaciones->executeQuery($sqlVacaciones)->fetchAll()[0];
		$this->datos["vacacionesEmpleados"]= $vacaciones;

		return $this->datos;
	}

	public function getTwig(){

		
		return "FrontEndBundle:Default:empleado.html.twig";
	}

}