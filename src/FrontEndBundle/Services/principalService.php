<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class principalService{

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


     	$tablaClases= [
		array("Hora" => "9:00","Clase" => "BodyCombat","Profesor"  => "Neus Martínez"),
		array("Hora" => "10:00","Clase" => "CicloIndoor","Profesor"  => "Cristian Medraño"),
		array("Hora" => "12:00","Clase" => "Boxeo","Profesor"  => "Ruth Sansano"),
		array("Hora" => "18:00","Clase" => "Gimnasia Rítmica","Profesor"  => "Belén Jiménez"),
		array("Hora" => "20:00","Clase" => "Zumba","Profesor"  => "Javier Navarro"),
		array("Hora" => "21:00","Clase" => "Pilates","Profesor"  => "Rubén Córcoles"),
    	
        
		];


     	$this->datos["tablaClases"] = $tablaClases;



     	$tablaEmpleados= [
		array("Nombre" => "Neus","Apellidos" => "Matínez Martínez","Dirección"=> "Avda. Capitán Gaspar Ortiz, 5","DNI"=>"70221166P","Teléfono" => "698632059","Función" => "Monitor de BodyCombat"),
    	array("Nombre"=> "Cristian","Apellidos" => "Medraño Quiles","Dirección"=> "Avda. Alicante, 52","DNI"=>"80229266F","Teléfono" => "633332059","Función" => "Monitor de Ciclo Indoor"),
        array("Nombre"=> "Belén","Apellidos" => "Jiménez Ortiz","Dirección"=> "C/Antonio Machado, 25","DNI"=>"45229866D","Teléfono" => "698632229","Función" => "Monitor de Gimnasia Rítmica"),
        array("Nombre"=> "Ruth","Apellidos" => "Sansano Cartujo","Dirección"=> "C/Jorge Juan, 5","DNI"=>"23629377Z","Teléfono" => "696631119","Función" => "Monitor de Boxeo"),
        array("Nombre"=> "Javier","Apellidos" => "Navarro Antón","Dirección"=> "Avda. Alcalá, 10","DNI"=>"20329377U","Teléfono" => "698114449","Función" => "Monitor de Zumba"),
        array("Nombre"=> "Rubén","Apellidos" => "Córcoles Torres","Dirección"=> "C/La Purísima, 1","DNI"=>"66629377R","Teléfono" => "498632000","Función" => "Monitor de Pilates"),
        array("Nombre"=> "	Juan","Apellidos" => "Sandoval Quiles","Dirección"=> "C/La Tórtola, 99","DNI"=>"66699977V","Teléfono" => "498634569","Función" => "Monitor de Sala"),
        array("Nombre"=> "María","Apellidos" => "Lozano Alegre","Dirección"=> "C/Soledad, 15","DNI"=>"89679377W","Teléfono" => "798632001","Función" => "Limpiadora"),
        array("Nombre"=> "José","Apellidos" => "Rubio Giménez","Dirección"=> "C/Alfonso Soriano, 11","DNI"=>"89339377T","Teléfono" => "798622201","Función" => "Mantenimiento"),
        
		];


     	$this->datos["tablaEmpleados"] = $tablaEmpleados;


		return $this->datos;
	}

	public function getTwig(){

		
		return "FrontEndBundle:Default:principal.html.twig";
	}



}