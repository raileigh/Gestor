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

		$tablaEmpleados= [
		array("Nombre" => "Neus","Apellidos" => "Matínez Martínez","Dirección"=> "Avda. Capitán Gaspar Ortiz, 5","DNI"=>"70221166P","Teléfono" => "698632059"),
    	array("Nombre"=> "Cristian","Apellidos" => "Medraño Quiles","Dirección"=> "Avda. Alicante, 52","DNI"=>"80229266F","Teléfono" => "633332059"),
        array("Nombre"=> "Belén","Apellidos" => "Jiménez Ortiz","Dirección"=> "C/Antonio Machado, 25","DNI"=>"45229866D","Teléfono" => "698632229"),
        array("Nombre"=> "Ruth","Apellidos" => "Sansano Cartujo","Dirección"=> "C/Jorge Juan, 5","DNI"=>"23629377Z","Teléfono" => "696631119"),
        array("Nombre"=> "Javier","Apellidos" => "Navarro Antón","Dirección"=> "Avda. Alcalá, 10","DNI"=>"20329377U","Teléfono" => "698114449"),
        array("Nombre"=> "Rubén","Apellidos" => "Córcoles Torres","Dirección"=> "C/La Purísima, 1","DNI"=>"66629377R","Teléfono" => "498632000"),
        array("Nombre"=> "	Juan","Apellidos" => "Sandoval Quiles","Dirección"=> "C/La Tórtola, 99","DNI"=>"66699977V","Teléfono" => "498634569"),
        array("Nombre"=> "María","Apellidos" => "Lozano Alegre","Dirección"=> "C/Soledad, 15","DNI"=>"89679377W","Teléfono" => "798632001"),
        array("Nombre"=> "José","Apellidos" => "Rubio Giménez","Dirección"=> "C/Alfonso Soriano, 11","DNI"=>"89339377T","Teléfono" => "798622201"),
        
		];


     	$this->datos["tablaEmpleados"] = $tablaEmpleados;

		return $this->datos;
	}

public function getTwig(){

		
		return "FrontEndBundle:Default:empleado.html.twig";
	}


}