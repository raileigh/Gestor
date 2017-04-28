<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;



class vacacionesEmpleadoService{

	protected $vacaciones;

	public function __construct(Session $s, EntityManager $em){

		$this->em = $em;
		$this->s = $s;

	}

	public function getDatos(){


		$qbVacaciones = $this->em->getConnection();
		$sqlVacaciones = "

		SELECT Count(status) as valor

		FROM empleado

		WHERE status = 3

		";


		$vacaciones = $qbVacaciones->executeQuery($sqlVacaciones)->fetchAll()[0];
		return $vacaciones;


	}

}


