<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Service\MailerService;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager, TokenGeneratorInterface $tokenGeneratorInterface, MailerService $mailerService): Response
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

            $tokenRegistration = $tokenGeneratorInterface->generateToken();
            $user->setTokenRegistration($tokenRegistration);

            $entityManager->persist($user);
            $entityManager->flush();

            // do anything else you need here, like send an email
            $mailerService->send(

                $user->getEmail(),
                'Confirmation du compte utilisateur',
                'registration_confirmation.html.twig',
                [
                    'user' => $user,
                    'token' => $tokenRegistration,
                    'lifeTimeToken' => $user->getTokenRegistrationLifeTime()->format('d-m-Y H:i:s')
                ]
            );

            return $this->redirectToRoute('app_login');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form,
        ]);
    }




    // methode pour valider l'inscription du user

    #[Route('/verify/{token}/{id<\d+>}', name: 'account_verify', methods: ['GET'])]

    public function verify(string $token, User $user, EntityManagerInterface $em): Response
    {
        if ($user->getTokenRegistration() !== $token) {
            throw new AccessDeniedException();
        }
        if ($user->getTokenRegistration() === null) {
            throw new AccessDeniedException();
        }
        if (new DateTime('now') > $user->getTokenRegistrationLifeTime()) {
            throw new AccessDeniedException();
        }
        $user->setVerified(true);
        $user->setTokenRegistration("");
        $em->flush();
        return $this->redirectToRoute('app_login');
    }
}
