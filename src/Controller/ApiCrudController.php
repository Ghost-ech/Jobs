<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Entity\Entreprise;
use App\Repository\EntrepriseRepository;
use App\Repository\RefugierRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Refugier;
use App\Entity\Admin;
use App\Repository\AdminRepository;

/**
 *@IsGranted("ROLE_USER")
 *@Route("/api/crud")
 */

class ApiCrudController extends AbstractController
{
    #[Route('/', name: 'app_api_crud')]
    public function index(): Response
    {
        return $this->render('api_crud/index.html.twig', [
            'controller_name' => 'ApiCrudController',
        ]);
    }

    /**
     * @Route("/save_refugier",name="app_save_refugier")
     */

    /**
     * @Route("/save-entreprise", name="app_save_customer")
     */
    public function save_entreprise(EntrepriseRepository $entrepriseRepo, EntityManagerInterface $em, Request $request, AdminRepository $adminRepo)
    {
        $datas = $request->request->all();
        $entreprise = new Entreprise();
        $entreprise->setNom($datas['name']);
        $entreprise->setPrenom($datas['subname']);
        $entreprise->setPhone($datas['phone']);
        $entreprise->setResidence($datas['residence']);
        $entreprise->setEmail($datas['mail']);

        $admin = $adminRepo->find($this->getUser());

        $entreprise->setCreerPar($admin);
        $em->persist($entreprise);
        $em->flush();
        return new JsonResponse([['msg' => 'Well registered customer. view list']]);
    }

    /**
     * @Route("/save_admin", name="app_save_admin")
     */
    public function save_admin(AdminRepository $adminRepo, Request $request, UserRepository $userRepo, EntityManagerInterface $em)
    {
        $datas = $request->request->all();
        $user = $userRepo->find($datas['user_id']);
        $admin = new Admin();
        $admin->addUtilisateur($user);

        $user->setRoles(['ROLE_ADMIN', 'ROLE_ADMIN']);

        $em->persist($admin);
        $em->flush();

        return new JsonResponse([['msg' => 'Well registered Admin']]);
    }

}
