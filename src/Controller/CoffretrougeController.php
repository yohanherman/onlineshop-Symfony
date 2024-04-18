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
    public function showredwine(EntityManagerInterface $entitymanager): Response
    {
        $coffretrouge = $entitymanager->getRepository(Coffretrouge::class)->findBy(['category' => 'rouge']);
        // dd($coffretrouge);

        return $this->render('coffretrouge/index.html.twig', [
            'coffretrouges' => $coffretrouge,
        ]);
    }


    #[Route('/coffretblanc', name: 'coffretblanc')]
    public function showWhiteWine(EntityManagerInterface $entitymanager): Response
    {
        $coffretblancs = $entitymanager->getRepository(Coffretrouge::class)->findBy(['category' => 'blanc']);
        // dd($coffretblancs);

        return $this->render('coffretrouge/whitewine.html.twig', [
            'coffretblancs' => $coffretblancs,
        ]);
    }


    #[Route('/showcoffret/{id}', name: 'showcoffret')]
    public function showcoffret(EntityManagerInterface $entitymanager, int $id): Response
    {
        $fichescoffret = $entitymanager->getRepository(Coffretrouge::class)->find($id);

        return $this->render('coffretrouge/showcoffRouge.html.twig', [
            'fichecoffret' => $fichescoffret,
        ]);
    }
}
