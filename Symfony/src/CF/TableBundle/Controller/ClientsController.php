<?php

namespace CF\TableBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use CF\TableBundle\Entity\Clients;
use CF\TableBundle\Form\Type\ClientType;

class ClientsController extends Controller
{
    public function showClientsAction()
    {
		$repository = $this->getDoctrine()
			->getRepository('CFTableBundle:Clients');
		
		$clients = $repository->findAll();
		
		return $this->render(
			"CFTableBundle:Clients:clients.html.twig",
			array('clients' => $clients
			)
		);
    }

    public function newClientAction() {
    	return $this->render(
			"CFTableBundle:Clients:add.html.twig");
    }

    public function usersAction() {
      $userManager = $this->get('fos_user.user_manager');
      $users = $userManager->findUsers();

      return $this->render(
      "CFTableBundle:Clients:add.html.twig");
    }

    public function searchAction() {
    	$repository = $this->getDoctrine()->getRepository('CFTableBundle:Clients');
    	if ($_GET['searchedName']) {
    		$clients = $repository->findBy(
    			array('firstName' => $_GET['searchedName']));

    		return $this->render(
				"CFTableBundle:Clients:result.html.twig",
				array('clients' => $clients
				));
    	}

		return $this->redirectToRoute('cf_table_homepage');
    }

    public function addAction(Request $request)
    {
	    $em = $this->getDoctrine()->getManager();
		$client = new Clients();
		// $form = $this->createForm(new ClientType(), new Clients());

/* 		    $form = $this->createFormBuilder($clients)
        ->add('name', 'text')
		->add('firstName', 'text')
		->add('address', 'text')
		->add('zipCode', 'text')
		->add('tel', 'text')
		->add('email', 'text')
		->add('points', 'text')
        ->add('save', 'submit', array('label' => 'Enregistrer'))
        ->getForm();
		$clients->setName("MAISLOLQUOI");
		$form->handleRequest($request);

		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$clients->setName("LOL");
			$em->persist($clients);
			$em->flush();

			return $this->redirectToRoute('cf_table_homepage');
		}

		return $this->render(
			'CFTableBundle:Clients:add.html.twig',
			array('form' => $form->createView())
		); */
		
		$client->setName($_GET['name']);
		$client->setFirstName($_GET['firstName']);
		$client->setAddress($_GET['address']);
		$client->setZipCode($_GET['zipCode']);
		$client->setTel($_GET['tel']);
		$client->setEmail($_GET['email']);
		$client->setPoints($_GET['points']);
		$em->persist($client);
		$em->flush();
		
		return $this->redirectToRoute('cf_table_homepage');
	}
	
	public function addPointsAction($id, Request $request)
	{
		$em = $this->getDoctrine()->getManager();
		$client = $em->getRepository('CFTableBundle:Clients')->find($id);
		
		$client->addPoints($_GET['points']);
		$em->flush();
		return $this->redirectToRoute('cf_table_homepage');
	}

	public function minusPointsAction($id)
	{
		$em = $this->getDoctrine()->getManager();
		$client = $em->getRepository('CFTableBundle:Clients')->find($id);
		
		$client->minusPoints($_GET['points']);
		$em->flush();
		return $this->redirectToRoute('cf_table_homepage');
	}
}