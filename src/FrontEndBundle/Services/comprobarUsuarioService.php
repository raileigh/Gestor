<?php

namespace FrontEndBundle\Services;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class comprobarUsuarioService{

	protected $validar;
	protected $registrar;

	public function __construct(Container $c){

		
		$this->c = $c;

	}

	public function comprobarUsuario($datosPost){

		// Comprobar sesion
		$session = $this->c->get("session");// creo la variable sesión y le digo que me captura la sesion que esta abierta

		$nombre = $session->get("usuario")["nombre"];
		
		if ($nombre==null) {

			if (!isset($datosPost["login"])) //hare un campo hidden con el nombre login en el formulario de login que sera en chivato que me dice si viene de login o ha puesto a mano la url
			{
				
				$validar=false;

			}else{
			//aquí tengo que comprobar que el tio existe en BD para meterlo  a principal
				$em=$this->c->get('doctrine')->getEntityManager();
				$usuario = $em->getRepository("BackEndBundle:Usuario")->findOneBy(array("nombre"=> $datosPost["nombre"],"password"=> $datosPost["password"]));
				//Tengo que saber si es true o falso para mandarlo al controlador volviendo hacer un if else
				
				if (is_object($usuario)==false){
					
					$validar=false;

				}else{

					//LLegados al else sabemos que el usuario está en la bd por eso $validar es true enviando la variable al controlador diciédole que lo envie a la vista correspondiente y creando la sesión del usuario seteándole el nombre a la sesión.
					
					$validar=true;
					$session->set("usuario", array("nombre"=> $usuario->getNombre(),"id"=> $usuario->getId()));
					
				}

			}

		} else {

			$validar=true;

		}

		return $validar;

	}

}

