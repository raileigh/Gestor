<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;



class tablasPrincipalService{

        public function __construct(Session $s, EntityManager $em){

                $this->em = $em;
                $this->s = $s;

        }

        public function getDatos(){


                $conexion = $this->em->getConnection();
                $sql = "
                SELECT * 

                FROM empleado

                LIMIT 5

                ";

                $resultadoEmpleado = $conexion->executeQuery($sql)->fetchAll();
                
                 $sql = "
                SELECT *

                FROM cliente

                LIMIT 5

                ";

                $resultadoCliente = $conexion->executeQuery($sql)->fetchAll();
                
                $sql = "
                SELECT *

                FROM clase

                LIMIT 5

                ";

                $resultadoClase = $conexion->executeQuery($sql)->fetchAll();
                
                return array('resultadoEmpleado' => $resultadoEmpleado, 'resultadoCliente' => $resultadoCliente, 'resultadoClase' => $resultadoClase );

                
        }

}


