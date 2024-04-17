<?php

namespace App\Controller;

use App\Entity\Coffretrouge;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CoffretrougeController extends AbstractController
{
    #[Route('/coffretrouge', name: 'coffretrouge')]
    public function index(EntityManagerInterface $entitymanager): Response
    {
        $coffretrouge = $entitymanager->getRepository(Coffretrouge::class)->findAll();

        return $this->render('coffretrouge/index.html.twig', [
            'coffretrouges' => $coffretrouge,
        ]);
    }


    #[Route('/showcoffret/{id}', name: 'showcoffretrouge')]
    public function showcoffret(EntityManagerInterface $entitymanager, int $id): Response
    {
        $fichescoffret = $entitymanager->getRepository(Coffretrouge::class)->find($id);

        return $this->render('coffretrouge/showcoffRouge.html.twig', [
            'fichecoffret' => $fichescoffret,
        ]);
    }
}
