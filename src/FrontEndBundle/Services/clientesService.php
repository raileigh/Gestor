<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class clientesService{

	protected $datos;

	public function __construct(EntityManager $em){

		$this->em = $em;

	}

	public function getDatos($datosPost){

		$conexion = $this->em->getConnection();
		$sql = "
		SELECT nombre,apellidos,telefono,direccion,dni

		FROM cliente

		";

		$filas = $conexion->executeQuery($sql)->fetchAll();
		$cabeceras = array('NOMBRE','APELLIDOS','TELÉFONO','DIRECCIÓN','DNI');


		$this->datos["tablaClientes"]["filas"] = $filas;
		$this->datos["tablaClientes"]["cabeceras"] = $cabeceras;


		$qbStats = $this->em->getConnection();
		$fecha = new \Datetime();
		$fechas = $this->getFechas($fecha);
		$sqlStats = "

		SELECT Sum(if(status = 1, 1, 0)) AS baja,
		Sum(if(status = 2, 1, 0)) AS alta

		FROM cliente

		WHERE fecha_baja BETWEEN '".$fechas["inicio"]."' AND '".$fechas["fin"]."'  OR fecha_alta BETWEEN '".$fechas["inicio"]."' AND '".$fechas["fin"]."'

		";


		$stats = $qbStats->executeQuery($sqlStats)->fetchAll()[0];
		
		

		$this->datos["statsClientes"]["alta"] = isset($stats["alta"]) ? $stats["alta"] : 0;
		$this->datos["statsClientes"]["baja"]= isset($stats["baja"]) ? $stats["baja"] : 0;


		return $this->datos;
	}
	
	public function getTwig(){

		
		return "FrontEndBundle:Default:clientes.html.twig";
	}

	public function getFechas($fecha){

		$fecha->modify('first day of this month');
		$inicio = $fecha->format('Y-m-d');
		$fecha->modify('last day of this month');
		$fin = $fecha->format('Y-m-d');

		return  array('inicio' =>$inicio , 'fin' =>$fin);

	}

}