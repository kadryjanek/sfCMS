<?php

namespace Bootcamp\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$pages = $this->getDoctrine()
    		->getRepository('BootcampAdminBundle:Page')
    		->findAll();
    	
        return $this->render('BootcampFrontendBundle:Default:index.html.twig', array(
        	'pages'	=> $pages
        ));
    }
    
    public function showAction($slug)
    {
    	$page = $this->getDoctrine()
    		->getRepository('BootcampAdminBundle:Page')
    		->findOneBySlug($slug);
    	
    	if (!$page) {
    		throw $this->createNotFoundException("Strona o podanym adresie nie istnieje");
    	}
    	
    	return $this->render('BootcampFrontendBundle:Default:show.html.twig', array(
    		'page'	=> $page
    	));
    }
}
