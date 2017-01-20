<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class horarioService{

	protected $datos;

	public function construct(Container $c){

		$this->c = $c;
	}

	public function getDatos(){

		$tablaClases= [
		array("Hora" => "9:00","Clase" => "BodyCombat","Profesor"  => "Neus Martínez"),
		array("Hora" => "10:00","Clase" => "CicloIndoor","Profesor"  => "Cristian Medraño"),
		array("Hora" => "12:00","Clase" => "Boxeo","Profesor"  => "Ruth Sansano"),
		array("Hora" => "18:00","Clase" => "Gimnasia Rítmica","Profesor"  => "Belén Jiménez"),
		array("Hora" => "20:00","Clase" => "Zumba","Profesor"  => "Javier Navarro"),
		array("Hora" => "21:00","Clase" => "Pilates","Profesor"  => "Rubén Córcoles"),
    	
        
		];


     	$this->datos["tablaClases"] = $tablaClases;
     	
		return $this->datos;
	}

public function getTwig(){

		
		return "FrontEndBundle:Default:horario.html.twig";
	}


}