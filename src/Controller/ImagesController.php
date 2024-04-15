<?php

namespace App\Controller;

use App\Repository\ImagesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ImagesController extends AbstractController
{
    #[Route('/images/{id}', name: 'images_produits')]
    public function index(ImagesRepository $imagesRepository, int $id): Response
    {

        $images = $imagesRepository->findImageById($id);
        // dd($images);

        return $this->render('images/index.html.twig', [
            'images' => $images,
        ]);
    }
}
