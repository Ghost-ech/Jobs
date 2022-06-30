<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RefugierController extends AbstractController
{
    #[Route('/refugier', name: 'app_refugier')]
    public function index(): Response
    {
        return $this->render('refugier/index.html.twig', [
            'controller_name' => 'RefugierController',
        ]);
    }
}
