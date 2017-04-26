<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;



class estadisticasPrincipalService{

        public function __construct(Session $s, EntityManager $em){

                $this->em = $em;
                $this->s = $s;

        }

        public function getDatos(){

                
                $conexion = $this->em->getConnection();
                $fecha = new \Datetime();
                $fechas = $this->getFechas($fecha, "month");
                $sqlGastoExterno = "     

                SELECT Sum(importe) as valor1

                FROM gasto

                WHERE periodo BETWEEN '".$fechas["inicio"]."' AND '".$fechas["fin"]."'

                ";

                $gastoExterno = $conexion->executeQuery($sqlGastoExterno)->fetchAll()[0]["valor1"];
                

                $sqlGastoEmpleados = "

                SELECT Sum(salario) as valor2

                FROM empleado

                ";

                $gastoEmpleados = $conexion->executeQuery($sqlGastoEmpleados)->fetchAll()[0]["valor2"];
                

                $sqlIngreso = "

                SELECT Sum(cuota) as valor3

                FROM cliente

                WHERE status = 2;



                ";

                $ingreso = $conexion->executeQuery($sqlIngreso)->fetchAll()[0]["valor3"];
                
                $resultadoTotal = $ingreso - $gastoExterno - $gastoEmpleados;
                

               
                $fecha = new \Datetime();
                $fechas = $this->getFechas($fecha, "month");
                $sqlNewClientes = "

                SELECT Sum(if(status = 2, 1, 0)) AS alta

                FROM cliente

                WHERE fecha_alta BETWEEN '".$fechas["inicio"]."' AND '".$fechas["fin"]."'

                ";

                $newClientes = $conexion->executeQuery($sqlNewClientes)->fetchAll()[0]["alta"];
                
                return array('gastoExterno' => $gastoExterno,'gastoEmpleados' => $gastoEmpleados,'ingreso' => $ingreso, 'resultadoTotal' => $resultadoTotal, 'nuevosClientes' => $newClientes );

                
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


