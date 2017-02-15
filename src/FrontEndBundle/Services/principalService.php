<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class principalService{

	protected $datos;

	public function __construct(Container $c){

		$this->c = $c;
	}

	public function getDatos(){

		$emr = $this->c->get('doctrine')->getEntityManager();
        $conexion = $emr->getConnection();
        $sql = "
                SELECT *

                FROM empleado

                WHERE id

                ";

        $resultadoEmpleado = $conexion->executeQuery($sql)->fetchAll();


        $this->datos["resultadoEmpleado"] = $resultadoEmpleado;


     	$sql = "
                SELECT *

                FROM cliente

                WHERE id

                ";

        $resultadoCliente = $conexion->executeQuery($sql)->fetchAll();


        $this->datos["resultadoCliente"] = $resultadoCliente;



     	$sql = "
                SELECT *

                FROM clase

                WHERE tipo

                ";

        $resultadoClase = $conexion->executeQuery($sql)->fetchAll();


        $this->datos["resultadoClase"] = $resultadoClase;


        $sql = "
                SELECT Count(importe) as valor

                FROM gasto

                WHERE tipo=2 AND importe>329;

                ";

        $inesperadoLuz = $conexion->executeQuery($sql)->fetchAll()[0]["valor"];

     	$this->datos["gastosInesperados"]["luz"] = $inesperadoLuz;

        
        $sql = "
                SELECT Count(importe) as valor

                FROM gasto

                WHERE tipo=1 AND importe>250;

                ";

     	$inesperadoAgua =  $conexion->executeQuery($sql)->fetchAll()[0]["valor"];

     	$this->datos["gastosInesperados"]["agua"] = $inesperadoAgua;


        
        $sql = "
                SELECT Count(importe) as valor

                FROM gasto

                WHERE tipo=3 AND importe>370;

                ";

     	$inesperadoProveedor = $conexion->executeQuery($sql)->fetchAll()[0]["valor"];

     	$this->datos["gastosInesperados"]["proveedor"] = $inesperadoProveedor;


        return $this->datos;
	}

	public function getTwig(){

		
		return "FrontEndBundle:Default:principal.html.twig";
	}



}