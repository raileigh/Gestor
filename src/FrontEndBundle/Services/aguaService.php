<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class aguaService{

	protected $datos;

	public function construct(Container $c){

		$this->c = $c;
	}

	public function getDatos(){

		$tablaAgua= [
		array("Empresa" => "AIGÜES I SANEJAMENT D'ELX.S.A.","Concepto" => "Suministro de Agua","Periodo" => "01.01.2017 - 31.02.2017","Importe"=> "250,50€"),
    	array("Empresa" => "AIGÜES I SANEJAMENT D'ELX.S.A.","Concepto" => "Suministro de Agua","Periodo" => "01.03.2017 - 31.04.2017","Importe"=> "210,00€"),
    	array("Empresa" => "AIGÜES I SANEJAMENT D'ELX.S.A.","Concepto" => "Suministro de Agua","Periodo" => "01.05.2017 - 31.06.2017","Importe"=> "265,05€"),
     
		];


     	$this->datos["tablaAgua"] = $tablaAgua;


		return $this->datos;
	}
	
public function getTwig(){

		
		return "FrontEndBundle:Default:agua.html.twig";
	}



}