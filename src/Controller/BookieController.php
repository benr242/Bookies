<?php

namespace App\Controller;

use App\Odds\LineConverter;
use App\Odds\PairA;
use App\Odds\PairaLynes;
use App\Repository\UserRepository;
use App\Service\Bookie;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
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
    public function index(EntityManagerInterface $em, UserRepository $ur): Response
    {
        $random = Bookie::randomStatic();

        $users = $ur->findAll();
        $me = $ur->findOneBy(
            ['username' => "br"]
        );


        $myPair = new PairaLynes(-950, 650);
        $converter = new LineConverter($myPair);
        $myPair2 = new PairaLynes(-190, 170);
        $converter = new LineConverter($myPair2);

        //$converter->setLines(-100, 100);

        $mytest = LineConverter::test(21);
        $converter->setLines($myPair2);

        return $this->render('bookie/index.html.twig', [
            'controller_name' => 'BookieController',
            'random' => $random,
            'fImpProb' => $converter->getfImpProb(),
            'dImpProb' => $converter->getdImpProb(),
            'iProb' => $converter->getfImpProb() + $converter->getdImpProb(),
            'fOdds' => $converter->getFodds(),
            'dOdds' => $converter->getDodds(),
            'odds' => $converter->getFodds() + $converter->getDodds(),
            'mypair' => $myPair,
            'mytest' => $mytest,
            'myname' => $me->getFirstName(),
        ]);
    }

    #[Route('/moneyline',
        name: 'moneyline',
        priority: 10)]
    public function moneyline(): Response
    {
        $random = Bookie::randomStatic();
        $myPair = new PairA(-250, 200);

        $converter = new LineConverter($myPair, -250, 200);
        //$converter->setLines(-100, 100);


        //$test = LineConverter::hello(1044.234);
        $fa = LineConverter::getAPer($myPair, -250, 200);

        //$do = LineConverter::getDpercent(-250, 200);

        return $this->render('bookie/index.html.twig', [
            'controller_name' => 'BookieController',
            'random' => $random,
            'fImpProb' => $converter->getfImpProb(),
            'dImpProb' => $converter->getdImpProb(),
            'iodds' => $converter->getfImpProb() + $converter->getdImpProb(),
            'fOdds' => $converter->getFodds(),
            'dOdds' => $converter->getDodds(),
            'odds' => $converter->getFodds() + $converter->getDodds(),
            //'test' => $test,
            'fa' => $fa,
        ]);
    }
}
