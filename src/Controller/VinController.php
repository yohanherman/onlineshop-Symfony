<?php

namespace App\Controller;

use App\Entity\Vins;
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

    public function showwine(Request $request, VinsRepository $vinsRepository, int $id): Response
    {
        $vin = $vinsRepository->find($id);

        // dd($vin);

        return $this->render("vin/showvin.html.twig", ['vin' => $vin]);
    }
}
