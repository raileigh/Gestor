<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class empleadoService{

	protected $datos;

	public function construct(Container $c){

		$this->c = $c;
	}

	public function getDatos(){

		$this->datos="Esto es un dato";

		return $this->datos;
	}

public function getTwig(){

		
		return "empleado";
	}


}