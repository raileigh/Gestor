<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class proveedoresService{

	protected $datos;

	public function construct(Container $c){

		$this->c = $c;
	}

	public function getDatos(){

		$tablaProveedores= [
		array("Fecha" => "15.01.2017","Empresa" => "Nutrytec Sport & Health","Concepto" => "10 Unidades de botes de proteinas 2kg sabor chocolate","Importe"=> "500,00€"),
		array("Fecha" => "17.01.2017","Empresa" => "Grupo Leche Pascual, S.A.","Concepto" => "15 cajas de 4 unidades de botellas de agua 1.5L Bezoya","Importe"=> "200,00€"),
		array("Fecha" => "29.01.2017","Empresa" => "Limpiezas Renove","Concepto" => "4 paquetes de 5 Unidades de papel higiénico","Importe"=> "100,00€"),
    	array("Fecha" => "07.02.2017","Empresa" => "Nutrytec Sport & Health","Concepto" => "10 Unidades de botes de proteinas 1.5kg sabor fresa","Importe"=> "387,00€"),
    	array("Fecha" => "07.02.2017","Empresa" => "226ERS Sports Things","Concepto" => "15 Unidades de botes de Aminoácidos ramificados (BCAA) en polvo con vitamina B6","Importe"=> "375,00€"),
    	array("Fecha" => "10.02.2017","Empresa" => "Jabones Beltrán","Concepto" => "20 Unidades de botes de jabón de mano","Importe"=> "375,00€"),

		];


     	$this->datos["tablaProveedores"] = $tablaProveedores;


		return $this->datos;
	}
	
public function getTwig(){

		
		return "FrontEndBundle:Default:proveedores.html.twig";
	}



}