<?php

namespace GestorCntBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GestorCntBundle:Default:index.html.twig');
    }
}
