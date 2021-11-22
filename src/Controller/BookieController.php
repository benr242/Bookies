<?php

namespace App\Controller;

use App\Service\Bookie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookieController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home()
    {
        return $this->redirectToRoute('moneyline');
    }

    #[Route('/bookie', name: 'bookie')]
    public function index(): Response
    {
        $random = Bookie::randomStatic();

        return $this->render('bookie/index.html.twig', [
            'controller_name' => 'BookieController',
            'random' => $random,
        ]);
    }

    #[Route('/moneyline',
        name: 'moneyline',
        priority: 10)]
    public function moneyline(): Response
    {
        return $this->render('bookie/index.html.twig', [
            'controller_name' => 'BookieController',
        ]);
    }
}
