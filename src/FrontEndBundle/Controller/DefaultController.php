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

       /* Servicios de comprobación
        // $datosPost = $this->get('request')->request->all();
        $comprobarUsuario = $this->getcomprobarUsuario($datosPost); //true o false
        
        if ($comprobarUsuario == true){
        
        */
        $twig = $this->get("gestor.front.".$slug."Service")->getTwig();
        $datos = $this->get("gestor.front.".$slug."Service")->getDatos();
       /*
        }else{

            $twig = "login";
            $datos = null;
        }

        */
        
        return $this->render("FrontEndBundle:default:".$twig.".html.twig",array("datos"=> $datos));
    }

}
