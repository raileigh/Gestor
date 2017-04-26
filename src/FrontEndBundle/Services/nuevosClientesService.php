<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;



class nuevosClientesService{

	protected $alta;

	public function __construct(Session $s, EntityManager $em){

		$this->em = $em;
		$this->s = $s;

	}

	public function getDatos(){


		$qbStats = $this->em->getConnection();
		$fecha = new \Datetime();
		$fechas = $this->getFechas($fecha);
		$sqlStats = "

		SELECT Sum(if(status = 2, 1, 0)) AS valor

		FROM cliente

		WHERE fecha_alta BETWEEN '".$fechas["inicio"]."' AND '".$fechas["fin"]."'

		";


		$alta = $qbStats->executeQuery($sqlStats)->fetchAll()[0]['valor'];
		return $alta;



	}

	public function getFechas($fecha){

		$fecha->modify('first day of this month');
		$inicio = $fecha->format('Y-m-d');
		$fecha->modify('last day of this month');
		$fin = $fecha->format('Y-m-d');

		return  array('inicio' =>$inicio , 'fin' =>$fin);

	}

}


