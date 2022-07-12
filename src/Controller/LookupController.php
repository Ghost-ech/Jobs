<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


/**
*@IsGranted("ROLE_USER")
*@Route("/lookup")
*/
class LookupController extends AbstractController
{

    #[Route('/', name: 'app_lookup')]
    public function index(): Response
    {


    if($this->getUser()->getRoles()[0] == 'ROLE_ADMIN'){
        return $this->redirectToRoute('app_admin');
    }

    if($this->getUser()->getRoles()[0] == 'ROLE_USER'){
        return $this->redirectToRoute('app_refugier');
    }

    if($this->getUser() -> getRoles()[0] == 'ROLE_ENTREPRISE'){
        return $this->redirectToRoute('app_entreprise');
    }

    /* if($this->getUser() -> getRoles()[0] == 'ROLE_REFUGIER'){
        return $this->redirectToRoute('app_refugier');
    } */

        return $this->render('lookup/index.html.twig', [
            'controller_name' => 'LookupController',
        ]);
    }

}
