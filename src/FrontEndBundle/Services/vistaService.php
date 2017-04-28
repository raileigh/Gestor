<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;


class vistaService{

	protected $datos;

	public function __construct(EntityManager $em, widgetsVistaService $wv){

		$this->em = $em;
        $this->wv = $wv;
    }

    public function getDatos(){

        $listadoWidget = $this->wv->getListadoServicesWidgets();

        foreach ($listadoWidget as $widget => $serviceWidget) {

            $this->datos[$widget] = $serviceWidget->getDatos();

            
        }

        return $this->datos;

    }


    public function getTwig($slug){


            return "FrontEndBundle:Default:".$slug.".html.twig";
        }

        

    }