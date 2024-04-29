<?php

namespace App\Controller\API;

use App\Repository\VinsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ApiVinController extends AbstractController
{

    #[Route('/api/nos-vins', name: 'getAllWines', methods: ['GET'])]
    public function getAllwines(VinsRepository $vinsRepository, SerializerInterface $serializer): JsonResponse
    {
        $getAllWines = $vinsRepository->findAll();
        // dd($getAllWines);
        $jsonAllWines = $serializer->serialize($getAllWines, 'json', ['groups' => 'getAllWines']);

        return new JsonResponse(
            $jsonAllWines,
            Response::HTTP_OK,
            [],
            true
        );
    }

    #[Route('/api/nos-vins/{id}', name: 'detailWine', methods: ['GET'])]
    public function getOneWine(vinsRepository $vinsRepository, int $id, SerializerInterface $serializer): jsonResponse
    {
        $getAWine = $vinsRepository->find($id);

        $jsonGetAWine = $serializer->serialize($getAWine, 'json', ['groups' => 'getAllWines']);
        // dd($getAWine);

        return new JsonResponse(
            $jsonGetAWine,
            Response::HTTP_OK,
            [],
            true
        );
    }
}
