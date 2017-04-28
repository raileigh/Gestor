<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;



class activoEmpleadoService{

	protected $alta;

	public function __construct(Session $s, EntityManager $em){

		$this->em = $em;
		$this->s = $s;

	}

	public function getDatos(){


		$qbAlta =  $this->em->getConnection();
		$sqlAlta = "

		SELECT Count(status) as valor

		FROM empleado

		WHERE status = 2

		";


		$alta = $qbAlta->executeQuery($sqlAlta)->fetchAll()[0];
		return $alta;


	}

}


