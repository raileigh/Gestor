<?php

namespace FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
*@Route("/")
*/
class DefaultController extends Controller
{
    /**
    *@Route("/")
    *@Route("/{slug}", name="front")
    */
    public function indexAction($slug)
    {

       // Servicios de comprobación
        $datosPost = $this->get('request')->request->all();
        $comprobarUsuario = $this->get("gestor.front.comprobarUsuarioService")->comprobarUsuario($datosPost);
       
       // Valores por defecto

         $tipoRetorno = "render"; 

              
        //true o false
        
        
        if ($comprobarUsuario == true){

        //Cogemos listado de los widgets de la bd

        $widgetsVistaService = $this->get("gestor.front.widgetsVistaService");
        $listadoWidgets = $widgetsVistaService->getListadoWidgets($slug);

        //creamos la array que contendrán los widgets
        $servicesWidgets = [];

        
        // inyectamos los servicios de cada wiudget en cada array
        foreach ($listadoWidgets as $widget) {
        //widget[tablas][gastosInes]
        $servicesWidgets[$widget['nombreWidget']] = $this->get("gestor.front.".$widget['nombreWidget'].$slug."Service");
        }

        $widgetsVistaService->setListadoServicesWidgets($servicesWidgets);
        
        
        
        $destino = $this->get("gestor.front.vistaService")->getTwig($slug);
        $datos = $this->get("gestor.front.vistaService")->getDatos($datosPost);
        $datos = array("datos" => $datos);
        
       

            if (isset($datosPost["login"])||$slug==="login") //hare un campo hidden con el nombre login en el formulario de login que sera en chivato que me dice si viene de login o ha puesto a mano la url
            {
                $tipoRetorno = "redirectToRoute"; 
                $destino = "front";
                $datos = array("slug"=>"principal");
             
            }

           
            
            if ($slug=="logout") {

                $session = $this->get("session");
                $session->clear();
                $tipoRetorno = "redirectToRoute"; 
                $destino = "front";
                $datos = array("slug"=>"login");           

             }

     
        }else{
            
            if($slug==="registrar")
            {
                
                $destino = $this->get("gestor.front.vistaService")->getTwig($slug = "registrar");
                $datos = [];

            }else{

               $destino = $this->get("gestor.front.vistaService")->getTwig($slug = "login");
               $datos = [];
                
            }


         }
         return $this->$tipoRetorno($destino,$datos);
    }

}
