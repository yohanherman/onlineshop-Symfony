<?php

namespace App\Controller;

use App\Entity\Coffretrouge;
use App\Repository\CoffretrougeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;



#[Route('/coffretCart', name: 'coffretcart_')]
class CoffretCartController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(SessionInterface $session, CoffretrougeRepository $coffretrougeRepository): Response
    {

        $panier = $session->get('panier', []);
        // dd($panier);

        // j'initialise les variables
        $data = [];
        $total = 0;
        $totalavecreduc = 0;
        $coffret = 0;


        foreach ($panier as $id => $quantity) {

            $coffrets = $coffretrougeRepository->find($id);
            $data[] = [
                'coffrets' => $coffrets,
                'quantity' => $quantity
            ];
            $total += $coffrets->getProductPrice() * $quantity;
            $totalavecreduc += $coffrets->getProductPrice() * (1 - $coffrets->getDiscount() / 100) * $quantity;
            $coffret += $coffrets->getDiscount();
        }
        // dd($data);
        // dd($total);

        return $this->render('cartcoffret/index.html.twig', compact('data', 'total', 'totalavecreduc', 'coffret'));
    }


    #[Route('/add/{id}', name: 'add')]
    public function add(Coffretrouge $coffrets, SessionInterface $session, int $id): Response
    {
        // 1: je recupere l'id du produit a l'aide de l'entité coffretrouge
        $id = $coffrets->getId();

        // 2: je recupere le panier existant que je vais chercher dans la session
        // et si elle n'existe pas dans ma session je mets un panier vide []
        $panier = $session->get('panier', []);

        //3: j'ajoute le produit dans le panier s'il n'y est pas encore
        // sinon j'incremente sa quantité
        $quantity = (int)$_POST["quantity"];

        if (empty($panier[$id])) {

            if ($quantity > 0) {
                $panier[$id] = $quantity;
            } else {
                $panier[$id] = 1;
            }
        } elseif (!empty($panier[$id])) {

            if ($quantity > 0) {
                $panier[$id] += $quantity;
            } else {
                $panier[$id]++;
            }
        }


        //4: j'enregistre mon panier dans la session
        $session->set('panier', $panier);
        // dd($session);

        //5: je redirige vers la page du panier donc dans ma methode index definie plus haut name:index

        return $this->redirectToRoute('coffretcart_index');
    }




    #[Route('/addMore/{id}', name: 'addMore')]
    public function addMore(Coffretrouge $coffrets, SessionInterface $session, int $id): Response
    {
        // 1: je recupere l'id du produit a l'aide du repository vin
        $id = $coffrets->getId();

        // 2: je recupere le panier existant que je vais chercher dans la session
        // et si elle n'existe pas dans ma session je mets un panier vide []
        $panier = $session->get('panier', []);

        //3:si le panier n'est pas vide j'incremente la valeur de 1 a chaque click

        if (!empty($panier[$id])) {
            $panier[$id]++;
        } else {
            return false;
        }

        //4: j'enregistre mon panier dans la session
        $session->set('panier', $panier);
        // dd($session);

        //5: je redirige vers la page du panier donc dans ma methode index definie plus haut name:accueilpanier
        return $this->redirectToRoute('coffretcart_index');
    }


    #[Route('/remove/{id}', name: 'remove')]
    public function remove(Coffretrouge $coffrets, SessionInterface $session, int $id): Response
    {
        // 1: je recupere l'id du produit a l'aide du repository vin
        $id = $coffrets->getId();

        // 2: je recupere le panier existant que je vais chercher dans la session
        // et si elle n'existe pas dans ma session je mets un panier vide []
        $panier = $session->get('panier', []);

        if (!empty($panier[$id])) {

            if ($panier[$id] > 1) {
                $panier[$id]--;
            } else {
                unset($panier[$id]);
            }
        }

        //4: j'enregistre mon panier dans la session
        $session->set('panier', $panier);
        // dd($session);

        //5: je redirige vers la page du panier donc dans ma methode index definie plus haut name:accueilpanier

        return $this->redirectToRoute('coffretcart_index');
    }


    #[Route('/deleteprod/{id}', name: 'delete')]
    public function deleteprod(Coffretrouge $coffrets, SessionInterface $session, int $id): Response
    {
        // 1: je recupere l'id du produit a l'aide du repository vin
        $id = $coffrets->getId();

        // 2: je recupere le panier existant que je vais chercher dans la session
        $panier = $session->get('panier', []);

        if (!empty($panier[$id])) {
            unset($panier[$id]);
        }

        //4: j'enregistre mon panier dans la session
        $session->set('panier', $panier);
        // dd($session);

        //5: je redirige vers la page du panier donc dans ma methode index definie plus haut name:index

        return $this->redirectToRoute('coffretcart_index');
    }


    #[Route('/empty', name: 'empty')]
    public function empty(SessionInterface $session): Response
    {

        // j'efface toute ma session
        $session->remove("panier");

        return $this->redirectToRoute('coffretcart_index');
    }
}
