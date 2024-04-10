<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CartController extends AbstractController
{
    #[Route('/cart', name: 'cart')]
    public function index(): Response
    {

        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('cart/index.html.twig', [
            'controller_name' => 'CartController',
        ]);
    }
}
