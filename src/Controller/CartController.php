<?php

namespace App\Controller;

use App\Entity\Vins;
use App\Repository\VinsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;



#[Route('/cart', name: 'cart_')]
class CartController extends AbstractController
{

    #[Route('/', name: 'index')]
    public function index(SessionInterface $session, VinsRepository $vinsRepository): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }

        $panier = $session->get('panier', []);
        // dd($panier);

        // j'initialise les variables
        $data = [];
        $total = 0;
        $totalavecreduc = 0;
        $vin = 0;

        foreach ($panier as $id => $quantity) {

            $vins = $vinsRepository->find($id);

            $data[] = [
                'vins' => $vins,
                'quantity' => $quantity
            ];

            $total += $vins->getProductPrice() * $quantity;
            $totalavecreduc += $vins->getProductPrice() * (1 - $vins->getDiscountPrice() / 100) * $quantity;
            $vin += $vins->getDiscountPrice();
        }
        // dd($data);
        // dd($total);

        return $this->render('cart/index.html.twig', compact('data', 'total', 'totalavecreduc', 'vin'));
    }

    #[Route('/add/{id}', name: 'add')]
    public function add(Vins $vins, SessionInterface $session, int $id): Response
    {
        // 1: je recupere l'id du produit a l'aide du repository vin
        $id = $vins->getId();

        // 2: je recupere le panier existant que je vais chercher dans la session
        // et si elle n'existe pas dans ma session je mets un panier vide []
        $panier = $session->get('panier', []);

        //3: j'ajoute le produit dans le panier s'il n'y est pas encore
        // sinon j'incremente sa quantité

        $quantity = $_POST["quantity"];

        if (empty($panier[$id])) {

            $panier[$id] = $quantity;
        } else {
            $panier[$id] += $quantity;
        }

        //4: j'enregistre mon panier dans la session
        $session->set('panier', $panier);
        // dd($session);

        //5: je redirige vers la page du panier donc dans ma methode index definie plus haut name:accueilpanier

        return $this->redirectToRoute('cart_index');
    }
}
