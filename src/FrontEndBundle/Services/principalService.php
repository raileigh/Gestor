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

		$em = $this->c->get('doctrine')->getEntityManager();
        $conexion = $em->getConnection();
        $sql = "
        SELECT * 

        FROM empleado

        LIMIT 5

        ";

        $resultadoEmpleado = $conexion->executeQuery($sql)->fetchAll();
        $this->datos["resultadoEmpleado"] = $resultadoEmpleado;


        $sql = "
        SELECT *

        FROM cliente

        LIMIT 5

        ";

        $resultadoCliente = $conexion->executeQuery($sql)->fetchAll();
        $this->datos["resultadoCliente"] = $resultadoCliente;



        $sql = "
        SELECT *

        FROM clase

        LIMIT 5

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

        $qbGastoExterno = $em->getConnection();
        $fecha = new \Datetime();
        $fechas = $this->getFechas($fecha, "month");
        $sqlGastoExterno = "     

        SELECT Sum(importe) as valor1

        FROM gasto

        WHERE periodo BETWEEN '".$fechas["inicio"]."' AND '".$fechas["fin"]."'

        ";

        $gastoExterno = $qbGastoExterno->executeQuery($sqlGastoExterno)->fetchAll()[0]["valor1"];
        $this->datos["gastoExterno"] = $gastoExterno;

        $sqlGastoEmpleados = "

        SELECT Sum(salario) as valor2

        FROM empleado

        ";

        $gastoEmpleados = $conexion->executeQuery($sqlGastoEmpleados)->fetchAll()[0]["valor2"];
        $this->datos["gastoEmpleados"] = $gastoEmpleados;

        $sqlIngreso = "

        SELECT Sum(cuota) as valor3

        FROM cliente

        WHERE status = 2;



        ";

        $ingreso = $conexion->executeQuery($sqlIngreso)->fetchAll()[0]["valor3"];
        $this->datos["ingreso"] = $ingreso;


        $resultadoTotal = $ingreso - $gastoExterno - $gastoEmpleados;
        $this->datos["resultadoTotal"] = $resultadoTotal;


        $fechas = $this->getFechas($fecha, "year");
        $configSql = array("gasto", "ingreso");
        $grafica=[];
        foreach ($configSql as $tabla) {
            $qbGrafica = $em->getConnection();
            $sqlGrafica = "     
            
            SELECT month(periodo) as mes, 
            Sum(importe) as cantidad

            FROM $tabla

            WHERE periodo BETWEEN '".$fechas["inicio"]."' AND '".$fechas["fin"]."'
            GROUP BY mes

            ";

            $grafica[$tabla] = $qbGrafica->executeQuery($sqlGrafica)->fetchAll();

        }



        $datosGrafica = [['MES', 'GASTOS', 'INGRESOS']];//creo la array con los tres elementos que necesito
        $meses = array('ENE','FEB','MAR','ABR','MAY','JUN','JUL','AGO','SEP','OCT','NOV','DIC');//creo la array con los meses del año

        for ($i=0; $i < sizeof($meses); $i++) {

            $fila = []; // creo la array la array que se va a ciclar y me va a dar los datos necesarios
            $gasto = 0;//inicializamos el gasto por si no lo encuentra
            for ($j=0; $j < sizeof($grafica["gasto"]); $j++) { 


               if (isset($grafica["gasto"][$j]) && $grafica["gasto"][$j]["mes"] == ($i+1)){

                 $gasto = (float)$grafica["gasto"][$j]["cantidad"];

             }
         }

            $ingreso = 0;//inicializamos el gasto por si no lo encuentra
            for ($z=0; $z < sizeof($grafica["ingreso"]); $z++) { 

               if (isset($grafica["ingreso"][$z]) && $grafica["ingreso"][$z]["mes"] == ($i+1)){


                $ingreso = (float)$grafica["ingreso"][$z]["cantidad"];

            }

        }

        $fila = array($meses[$i] , $gasto, $ingreso);
        array_push($datosGrafica, $fila);
    }

    $this->datos["grafica"]= $datosGrafica;

    $qbNewClientes = $em->getConnection();
    $fecha = new \Datetime();
    $fechas = $this->getFechas($fecha, "month");
    $sqlNewClientes = "

    SELECT Sum(if(status = 2, 1, 0)) AS alta

    FROM cliente

    WHERE fecha_alta BETWEEN '".$fechas["inicio"]."' AND '".$fechas["fin"]."'

    ";


    $newClientes = $qbNewClientes->executeQuery($sqlNewClientes)->fetchAll()[0]["alta"];
    $this->datos["nuevosClientes"]= $newClientes;


    return $this->datos;
}

    public function getTwig(){


    return "FrontEndBundle:Default:principal.html.twig";
    }

    public function getFechas($fecha,$temporalidad){

    switch ($temporalidad) {

        case 'month':
        $fecha->modify('first day of this '. $temporalidad);
        $inicio = $fecha->format('Y-m-d');
        $fecha->modify('last day of this '. $temporalidad);
        $fin = $fecha->format('Y-m-d');

        break;

        case 'year':

        $inicio = date('Y-m-d',strtotime(date('Y-01-01')));
        $fin = date('Y-m-d',strtotime(date('Y-12-31')));

        break;
        
        default:
            # code...
        break;
    }

    return  array('inicio' =>$inicio , 'fin' =>$fin);

    }

}