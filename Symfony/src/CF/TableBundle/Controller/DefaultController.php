<?php

namespace CF\TableBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ClientsController extends Controller
{
    public function showClientsAction($name)
    {
		$content = $this->get('templating')->render('CFTableBundle:Default:clients.html.twig', array(
        'nom' => 'winzou'
    ));
		return new Response($content);
    }
}
