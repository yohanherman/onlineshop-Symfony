<?php

namespace App\Controller\API;

use App\Entity\Reviews;
use App\Repository\ReviewsRepository;
use App\Repository\UserRepository;
use App\Repository\VinsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ApiReviewController extends AbstractController
{

    #[Route('/api/reviews', name: 'getReviews', methods: ['GET'])]
    public function getAllReviews(ReviewsRepository $reviewsRepository, SerializerInterface $serializer): JsonResponse
    {
        $getReviews = $reviewsRepository->findAll();
        // dd($getReviews);
        $jsonGetReviews = $serializer->serialize($getReviews, 'json', ['groups' => 'getAllReviews']);

        return new JsonResponse(
            $jsonGetReviews,
            200,
            [],
            true
        );
    }


    #[Route('/api/reviews/{id}', name: 'detailReview', methods: ['GET'])]
    public function getOneReview(ReviewsRepository $reviewsRepository, int $id, SerializerInterface $serializer): JsonResponse
    {
        $getAreview = $reviewsRepository->find($id);
        // dd($getAreview);
        $jsonGetAReview = $serializer->serialize($getAreview, 'json', ['groups' => 'getAllReviews']);

        return new JsonResponse(
            $jsonGetAReview,
            Response::HTTP_OK,
            [],
            true
        );
    }


    #[route('/api/reviews', name: 'createReviews', methods: ['POST'])]
    public function createReviews(Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager, VinsRepository $vinsRepository, UserRepository $userRepository): JsonResponse
    {

        $Review = $serializer->deserialize($request->getContent(), Reviews::class, 'json');

        $content = $request->toArray();
        $idVin = $content['idVin'] ?? -1;
        $idUser = $content['idUser'] ?? -1;

        $Review->setVins($vinsRepository->find($idVin));
        $Review->setUser($userRepository->find($idUser));

        $entityManager->persist($Review);
        $entityManager->flush();


        $jsonReview = $serializer->serialize($Review, 'json', ['groups' => 'getAllReviews']);

        return new JsonResponse(
            $jsonReview,
            201,
            [],
            true
        );
    }


    #[Route('/api/reviews/{id}', name: 'removeReviews', methods: ['DELETE'])]
    public function removeReviews(Reviews $reviews, EntityManagerInterface $entityManager): JsonResponse
    {

        $entityManager->remove($reviews);
        $entityManager->flush();

        return new JsonResponse(
            null,
            Response::HTTP_NO_CONTENT
        );
    }
}
