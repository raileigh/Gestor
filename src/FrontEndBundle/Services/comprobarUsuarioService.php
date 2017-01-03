<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class comprobarUsuarioService{

	protected $validar;

	public function_construct(Container $c){

		$this->c = $c;
	}

	public function comprobarUsuario($datosPost){

		//comprobar que un usuario esta en sesión o no
			//Si esta en sesion, retornara(true) y el trabajo lo tendrá ahora en controller
			//No existe, retornara(false) que tendra que comprobar en la base de datos si existe el usuario y lo metería en sesión si viene de loguin que sabre mediante request ya que en el formulario tendré un hidden con la palabra name= check value=login y si el request viene vacio es que el tio se ha pasado de listo.

		return $validar;
	}


	}

