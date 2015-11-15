<?php

namespace CF\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use CF\UserBundle\Entity\User;

class ClientsController extends Controller
{
    public function showClientsAction()
    {
      $userManager = $this->get('fos_user.user_manager');
      $users = $userManager->findUsers();
    
      return $this->render(
      "CFTableBundle:Clients:add.html.twig");
    }
}