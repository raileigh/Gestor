<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class logoutService{
	

	protected $datos;

	public function construct(Container $c){

		$this->c = $c;
	}

	public function getDatos(){
		echo "entra en el getDatos";

		$this->datos=[];

		return $this->datos;
	}


	public function getTwig(){

		echo "entra en el getTwig";

		return "FrontEndBundle:Default:login.html.twig";
	}

}