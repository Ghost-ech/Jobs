<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


/**
*@IsGranted("ROLE_USER")
*@Route("/refugier")
*/
class RefugierController extends AbstractController
{
    #[Route('/', name: 'app_refugier')]
    public function index(): Response
    {
        return $this->render('refugier/index.html.twig', [
            'controller_name' => 'RefugierController',
        ]);
    }

    #[Route('/', name: 'app_edit_profil')]
    public function edit_profil(): Response
    {
        return $this->render('refugier/edit_profil.html.twig', [
            'controller_name' => 'RefugierController',
        ]);
    }
}
