<?php

namespace GestorBackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GestorBackBundle:Default:index.html.twig');
    }
}
