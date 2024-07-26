<?php

namespace App\Controller;

use App\Entity\Vins;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SpecifiqproductController extends AbstractController
{
    #[Route('/specifiqproduct/{id}', name: 'app_specifiqproduct')]
    public function index(EntityManagerInterface $entityManager, int $id): Response
    {

        $vinSpecifiques = $entityManager->getRepository(Vins::class)->find($id);

        // dd($vinSpecifiques);
        return $this->render('specifiqproduct/index.html.twig');
    }
}
