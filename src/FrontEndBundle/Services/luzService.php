<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class luzService{

	protected $datos;

	public function construct(Container $c){

		$this->c = $c;
	}

	public function getDatos(){

		$tablaLuz= [
		array("Empresa" => "IBERDROLA.S.A.","Concepto" => "Suministro de Luz","Periodo" => "01.01.2017 - 31.01.2017","Importe"=> "300,20€"),
    	array("Empresa" => "IBERDROLA.S.A.","Concepto" => "Suministro de Luz","Periodo" => "01.02.2017 - 31.02.2017","Importe"=> "330,00€"),
    	array("Empresa" => "IBERDROLA.S.A.","Concepto" => "Suministro de Luz","Periodo" => "01.03.2017 - 31.03.2017","Importe"=> "305,10€"),
     
		];


     	$this->datos["tablaLuz"] = $tablaLuz;


		return $this->datos;
	}
	
public function getTwig(){

		
		return "FrontEndBundle:Default:luz.html.twig";
	}



}