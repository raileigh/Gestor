<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;



class bajasClientesService{

	protected $baja;

	public function __construct(Session $s, EntityManager $em){

		$this->em = $em;
		$this->s = $s;

	}

	public function getDatos(){


		$qbStats = $this->em->getConnection();
		$fecha = new \Datetime();
		$fechas = $this->getFechas($fecha);
		$sqlStats = "

		SELECT Sum(if(status = 1, 1, 0)) AS valor
		

		FROM cliente

		WHERE fecha_baja BETWEEN '".$fechas["inicio"]."' AND '".$fechas["fin"]."'

		";


		$baja = $qbStats->executeQuery($sqlStats)->fetchAll()[0]['valor'];
		return $baja;


	}

	public function getFechas($fecha){

		$fecha->modify('first day of this month');
		$inicio = $fecha->format('Y-m-d');
		$fecha->modify('last day of this month');
		$fin = $fecha->format('Y-m-d');

		return  array('inicio' =>$inicio , 'fin' =>$fin);

	}

}


