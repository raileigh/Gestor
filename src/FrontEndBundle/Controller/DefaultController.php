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
        
        
        $destino = $this->get("gestor.front.".$slug."Service")->getTwig();
        $datos = $this->get("gestor.front.".$slug."Service")->getDatos();

            if (isset($datosPost["login"])||$slug==="login") //hare un campo hidden con el nombre login en el formulario de login que sera en chivato que me dice si viene de login o ha puesto a mano la url
            {
                $tipoRetorno = "redirectToRoute"; 
                $destino = "front";
                $datos = array("slug"=>"principal");
            
            }
              
         
        }else{
            
            if($slug==="registrar")
            {
                echo "Estoy en el if de registrar";
                $destino = $this->get("gestor.front.registrarService")->getTwig();
                $datos = [];

            }else{

                echo "estoy en el else de login";
                $destino = $this->get("gestor.front.loginService")->getTwig();
                $datos = [];
            }
            
        
        }

        return $this->$tipoRetorno($destino,$datos);
    }

}
