<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class perfilService{

	protected $datos;

	public function __construct(Session $s, EntityManager $em){

		
		$this->s = $s;
		$this->em = $em;

	}

	public function getDatos($datosPost){

		if (isset($datosPost["perfil"])) //hare un campo hidden con el nombre perfil en el formulario de perfil que sera en chivato que me dice si viene de perfil o ha puesto a mano la url
			{
				$conexionActualizar = $this->em->getConnection();
				$id = $this->s->get("usuario")["id"];
				$sqlActualizar = "UPDATE usuario
								  SET
								  nombre = '".$datosPost["nombre"]."',
								  correo = '".$datosPost["correo"]."',
								  empresa = '".$datosPost["empresa"]."',
								  direccion = '".$datosPost["direccion"]."',
								  codigoPostal = '".$datosPost["codigoPostal"]."',
								  ciudad = '".$datosPost["ciudad"]."' WHERE id = ".$id;
				$resultado = $conexionActualizar->executeQuery($sqlActualizar);

			}
			


		$conexion = $this->em->getConnection();
		$id = $this->s->get("usuario")["id"];
		$sql = "SELECT * FROM usuario WHERE id = ".$id;
		$resultado = $conexion->executeQuery($sql)->fetchAll();


     	$this->datos["usuario"] = $resultado;


		return $this->datos;
	}

	
public function getTwig(){

		
		return "FrontEndBundle:Default:perfil.html.twig";
	}



}