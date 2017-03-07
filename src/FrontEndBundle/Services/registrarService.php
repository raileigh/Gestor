<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class registrarService{

	protected $datos;

	public function construct(Container $c){

		$this->c = $c;
	}

	public function getDatos(){

		$this->datos=[];

		return $this->datos;
	}

	public function getTwig(){

		return "FrontEndBundle:Default:registrar.html.twig";
	}

}