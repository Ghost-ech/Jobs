<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use App\Repository\UserRepository;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
            $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $user->setPhone('indefini');
            $user->setResidence('indefini');
            $user->setBiographie('indefini');
            $user->setRoles(["ROLE_USER"]);

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_home');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/init", name="app_init")
     */
    public function init(Request $request, UserPasswordHasherInterface $userPasswordHasher,UserRepository $userRepo,EntityManagerInterface $entityManager)
    {

        $user = new User();

        $user->setNom('Yan');
        $user->setPrenom('Keumoe');
        $user->setPhone('655027252');
        $user->setResidence('Douala');
        $user->setBiographie('Programmer et passionner des nouvelles technologies');
        $user->setRoles(["ROLE_ADMIN"]);
        $user->setPassword(
            $userPasswordHasher->hashPassword(
                    $user,
                    'azerty'
                )
            );

            $user->setEmail('kamgangyan@gmail.com');

        // $userRepo->add($user);
        $entityManager->persist($user);
        $entityManager->flush();


        return $this->redirectToRoute('app_admin');

    }

    /**
     * @Route("/ent", name="app_ent")
     */
    public function ent(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserRepository $userRepo, EntityManagerInterface $entityManager)
    {

        $user = new User();

        $user->setNom('Yan');
        $user->setPrenom('Keumoe');
        $user->setPhone('655027252');
        $user->setResidence('Douala');
        $user->setBiographie('Programmer et passionner des nouvelles technologies');
        $user->setRoles(["ROLE_ENTREPRISE"]);
        $user->setPassword(
            $userPasswordHasher->hashPassword(
                $user,
                'azerty'
            )
        );

        $user->setEmail('ghost@gmail.com');

        // $userRepo->add($user);
        $entityManager->persist($user);
        $entityManager->flush();


        return $this->redirectToRoute('app_entreprise');
    }

}
