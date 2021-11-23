<?php

namespace App\Controller;

use App\Odds\LineConverter;
use App\Service\Bookie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookieController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home()
    {
        return $this->redirectToRoute('bookie');
    }

    #[Route('/bookie', name: 'bookie')]
    public function index(): Response
    {
        $random = Bookie::randomStatic();

        $converter = new LineConverter(-250, 200);
        //$converter->setLines(-100, 100);

        return $this->render('bookie/index.html.twig', [
            'controller_name' => 'BookieController',
            'random' => $random,
            'fImpProb' => $converter->getfImpProb(),
            'dImpProb' => $converter->getdImpProb(),
            'fOdds' => $converter->getFodds(),
            'dOdds' => $converter->getDodds(),
            'odds' => $converter->getFodds() + $converter->getDodds()
        ]);
    }

    #[Route('/moneyline',
        name: 'moneyline',
        priority: 10)]
    public function moneyline(): Response
    {
        $random = Bookie::randomStatic();

        $converter = new LineConverter(-250, 200);
        //$converter->setLines(-100, 100);

        return $this->render('bookie/index.html.twig', [
            'controller_name' => 'BookieController',
            'random' => $random,
            'fImpProb' => $converter->getfImpProb(),
            'dImpProb' => $converter->getdImpProb(),
            'fOdds' => $converter->getFodds(),
            'dOdds' => $converter->getDodds(),
            'odds' => $converter->getFodds() + $converter->getDodds()
        ]);
    }
}
