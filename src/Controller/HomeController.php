<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(SessionInterface $session): Response
    {
        $session->set('basket',[
            [
                'id' => 522,
                'quantity' => 12
            ]
        ]);
        $basket = $session->get('basket');
        dd($basket);
        return $this->render('home/index.html.twig');
    }
}
