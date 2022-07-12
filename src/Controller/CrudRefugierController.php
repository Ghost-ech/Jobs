<?php

namespace App\Controller;

use App\Entity\Refugier;
use App\Form\RefugierType;
use App\Repository\RefugierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/crud/refugier')]
class CrudRefugierController extends AbstractController
{
    #[Route('/', name: 'app_crud_refugier_index', methods: ['GET'])]
    public function index(RefugierRepository $refugierRepository): Response
    {
        return $this->render('crud_refugier/index.html.twig', [
            'refugiers' => $refugierRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_crud_refugier_new', methods: ['GET', 'POST'])]
    public function new(Request $request, RefugierRepository $refugierRepository): Response
    {
        $refugier = new Refugier();
        $form = $this->createForm(RefugierType::class, $refugier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $refugierRepository->add($refugier, true);

            return $this->redirectToRoute('app_crud_refugier_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('crud_refugier/new.html.twig', [
            'refugier' => $refugier,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_crud_refugier_show', methods: ['GET'])]
    public function show(Refugier $refugier): Response
    {
        return $this->render('crud_refugier/show.html.twig', [
            'refugier' => $refugier,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_crud_refugier_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Refugier $refugier, RefugierRepository $refugierRepository): Response
    {
        $form = $this->createForm(RefugierType::class, $refugier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $refugierRepository->add($refugier, true);

            return $this->redirectToRoute('app_crud_refugier_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('crud_refugier/edit.html.twig', [
            'refugier' => $refugier,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_crud_refugier_delete', methods: ['POST'])]
    public function delete(Request $request, Refugier $refugier, RefugierRepository $refugierRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$refugier->getId(), $request->request->get('_token'))) {
            $refugierRepository->remove($refugier, true);
        }

        return $this->redirectToRoute('app_crud_refugier_index', [], Response::HTTP_SEE_OTHER);
    }
}
