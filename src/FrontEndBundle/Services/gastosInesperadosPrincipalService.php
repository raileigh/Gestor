<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;



class gastosInesperadosPrincipalService{

        public function __construct(Session $s, EntityManager $em){

                $this->em = $em;
                $this->s = $s;

        }

        public function getDatos(){

                $conexion = $this->em->getConnection();
                $sql = "
                SELECT Count(importe) as valor

                FROM gasto

                WHERE tipo=2 AND importe>329;

                ";

                $luz = $conexion->executeQuery($sql)->fetchAll()[0]["valor"];
                

                
                $sql = "
                SELECT Count(importe) as valor

                FROM gasto

                WHERE tipo=1 AND importe>250;

                ";

                $agua=  $conexion->executeQuery($sql)->fetchAll()[0]["valor"];
                


                
                $sql = "
                SELECT Count(importe) as valor

                FROM gasto

                WHERE tipo=3 AND importe>370;

                ";

                $proveedor = $conexion->executeQuery($sql)->fetchAll()[0]["valor"];

                return array('luz' => $luz, 'agua' => $agua, 'proveedor' => $proveedor );

                
        }

}


