<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;



class bajaEmpleadoService{

	protected $baja;

	public function __construct(Session $s, EntityManager $em){

		$this->em = $em;
		$this->s = $s;

	}

	public function getDatos(){


		$qbBaja =  $this->em->getConnection();
		$sqlBaja = "

		SELECT Count(status) as valor

		FROM empleado

		WHERE status = 1

		";


		$baja = $qbBaja->executeQuery($sqlBaja)->fetchAll()[0];
		return $baja;


	}

}


