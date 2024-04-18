<?php

namespace App\Controller;

use App\Entity\Reviews;
use App\Entity\User;
use App\Entity\Vins;
use App\Form\ReviewsType;
use App\Repository\ReviewsRepository;
use App\Repository\VinsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class VinController extends AbstractController
{
    #[Route('/nos-vins', name: 'app_vin')]

    public function index(EntityManagerInterface $entityManager): Response
    {
        $vin = $entityManager->getRepository(Vins::class)->findAll();

        return $this->render('vin/index.html.twig', [
            'vins' => $vin,
        ]);
    }


    #[Route('/nos-vins/{id}', name: 'vinsShow', requirements: ['id' => '\d+'])]
    public function showwine(VinsRepository $vinsRepository, int $id): Response
    {
        $vin = $vinsRepository->find($id);

        // dd($vin);

        return $this->render("vin/showvin.html.twig", ['vin' => $vin]);
    }


    #[Route('/nos-vins/commentaire/{id}', name: 'commentaires')]
    public function createreviews(Request $request, EntityManagerInterface $entityManager, Vins $vins, ReviewsRepository $reviewsRepository): Response
    {
        $vin_id = $vins->getId();

        // dd($vin_id);

        // 1: je recupere le user qui est authentifié
        $user = $this->getUser();
        // dd($user);

        // 2: je verifie s'il est connecté
        if ($user) {
            $user_id = $user->getId();

            // dd($user_id);
        } else {
            // aucun user connecté, je fais quelque chose
            return new Response('connectez-vous pour voir et ajouter les commentaires');
        }



        $reviews = new Reviews();
        $form = $this->createForm(ReviewsType::class, $reviews);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($reviews);
            $entityManager->flush();
        }
        // dd($reviews);

        $commentaires = $reviewsRepository->findcommentbyIdVin($vin_id);
        // dd($commentaires);


        return $this->render('vin/commentaire.html.twig', ['form' => $form, 'vin_id' => $vin_id, 'user_id' => $user_id, 'commentaires' => $commentaires]);
    }
}
