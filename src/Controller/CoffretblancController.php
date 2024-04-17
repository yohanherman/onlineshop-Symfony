<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CoffretblancController extends AbstractController
{
    #[Route('/coffretblanc', name: 'coffretblanc')]
    public function index(): Response
    {
        return $this->render('coffretblanc/index.html.twig', [
            'controller_name' => 'CoffretblancController',
        ]);
    }
}
