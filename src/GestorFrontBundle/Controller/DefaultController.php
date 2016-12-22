<?php

namespace GestorFrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GestorFrontBundle:Default:index.html.twig');
    }

    public function principalAction()
    {
        return $this->render('GestorFrontBundle:Default:principal.html.twig');
    }

     public function loginAction()
    {
        return $this->render('GestorFrontBundle:Default:login.html.twig');
    }

    public function registrarAction()
    {
        return $this->render('GestorFrontBundle:Default:registrar.html.twig');
    }

    public function empleadoAction()
    {
        return $this->render('GestorFrontBundle:Default:empleado.html.twig');
    }
}
