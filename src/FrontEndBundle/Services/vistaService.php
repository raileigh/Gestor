<?php

namespace FrontEndBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;


class vistaService{

    protected $sesion;
	protected $datos;

	public function __construct(Session $s, EntityManager $em, widgetsVistaService $wv){
        $this->s = $s;
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

    public function setPostEnSesion($datosPost){
        $this->s->set("datosPost",$datosPost);
    }

    public function getTwig($slug){


            return "FrontEndBundle:Default:".$slug.".html.twig";
        }

        

    }