<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;



class luzGastoLuzService{

	public function __construct(Session $s, EntityManager $em){

		$this->em = $em;
		$this->s = $s;

	}

	public function getDatos(){


		$qbGasto =  $this->em->getConnection();
		$sqlGasto = "

		SELECT Sum(importe) as valor

		FROM gasto

		WHERE tipo = 2  AND periodo BETWEEN '2017-01-01' AND '2017-12-31'

		

		";


		$gasto = $qbGasto->executeQuery($sqlGasto)->fetchAll()[0];

		return $gasto;


	}

}


