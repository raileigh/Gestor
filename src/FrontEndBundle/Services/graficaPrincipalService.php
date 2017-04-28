<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;



class graficaPrincipalService{

        public function __construct(Session $s, EntityManager $em){

                $this->em = $em;
                $this->s = $s;

        }

        public function getDatos(){

                $fecha = new \Datetime();
                $fechas = $this->getFechas($fecha, "year");
                $configSql = array("gasto", "ingreso");
                $grafica=[];
                foreach ($configSql as $tabla) {
                    $qbGrafica = $this->em->getConnection();
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

            $fila = []; // creo la array que se va a ciclar y me va a dar los datos necesarios
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



return $datosGrafica;
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


