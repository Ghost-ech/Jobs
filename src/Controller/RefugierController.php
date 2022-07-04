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
}
