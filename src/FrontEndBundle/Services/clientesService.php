<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class clientesService{

	protected $datos;

	public function construct(Container $c){

		$this->c = $c;
	}

	public function getDatos(){

		$tablaUsuarios= [
		array("Nombre" => "Pedro","Apellidos" => "Trujillo García","Teléfono" => "798631234","Dirección"=> "Avda. Garriles, 5","DNI"=>"70229366J"),
    	array("Nombre"=> "Jesus","Apellidos" => "Muriño Quiles","Teléfono" => "678635678","Dirección"=> "Avda. Alicante, 52","DNI"=>"80229206H"),
        array("Nombre"=> "Bruno","Apellidos" => "Martínez Martínez","Teléfono" => "798639632","Dirección"=> "Avda. Zamora, 25","DNI"=>"65228866L"),
        array("Nombre"=> "Cristian","Apellidos" => "Sánchez Cartujo","Teléfono" => "638631478","Dirección"=> "Avda. Diagonal, 5","DNI"=>"74229377A"),
        array("Nombre"=> "Isabel","Apellidos" => "Miralles Antón","Teléfono" => "788638526","Dirección"=> "Avda. Alcalá, 10","DNI"=>"20329377A"),
        array("Nombre"=> "Juan","Apellidos" => "Sandoval Torres","Teléfono" => "698633269","Dirección"=> "Avda. Libertad, 1","DNI"=>"66629377T"),
     
		];


     	$this->datos["tablaUsuarios"] = $tablaUsuarios;


		return $this->datos;
	}
	
public function getTwig(){

		
		return "FrontEndBundle:Default:clientes.html.twig";
	}



}