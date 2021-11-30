<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Classe\Card;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CardController extends AbstractController
{
    private $entityManager;

    public function __construct( EntityManagerInterface  $entityManager) 
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/mon-panier", name="card")
     */
    public function index( Card $card): Response
    {
        $cardComplete = [];

        foreach ($card->get() as $id => $quantity){

            $cardComplete[] =[ 
                'product' => $this->entityManager->getRepository( Product::class)->findOneByid($id),
                'quantity' => $quantity
            ];
        }
        
        return $this->render('card/index.html.twig',[
            'card' => $cardComplete,
        ]);
    }

     /**
     * @Route("/card/add/{id}", name="add_to_card")
     */
    public function add( Card $card, $id): Response
    {
        
        $card->add($id);
        return $this->redirectToRoute('card');
    }
    /**
     * @Route("/card/remove", name="remove_my_card")
     */
    public function remove( Card $card): Response
    {
        
        $card->remove();
        return $this->redirectToRoute('products');
    }
}
