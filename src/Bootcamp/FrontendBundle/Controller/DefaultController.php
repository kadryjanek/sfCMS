<?php

namespace Bootcamp\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BootcampFrontendBundle:Default:index.html.twig');
    }
}
