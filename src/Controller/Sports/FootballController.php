<?php

namespace App\Controller\Sports;

use App\Entity\Prono;
use Symfony\Component\HttpFoundation\Response;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class FootballController extends AbstractController
{
    const FOOTBALL = 1;
    /**
     * @Route("/pronos/football", name="sports_football")
     * @throws \Exception
     */
    public function index(PaginatorInterface $paginator, Request $request)
    {
        $pronos = $paginator->paginate(
            $this->getDoctrine()
                ->getRepository(Prono::class)
                ->findAllPronosToComeUpQuery(self::FOOTBALL),
            $request->query->getInt('page', 1),
            6
        );

        return $this->render('pages/sports/football.html.twig',
            [
                'pronos' => $pronos
            ]);
    }

    /**
     * @Route("/pronos/football/today", name="sports_football_today")
     * @throws \Exception
     */
    public function today(PaginatorInterface $paginator, Request $request)
    {
        $pronos = $paginator->paginate(
            $this->getDoctrine()
                ->getRepository(Prono::class)
                ->findTodayPronosToComeUpQuery(self::FOOTBALL),
            $request->query->getInt('page', 1),
            6
        );

        return $this->render('pages/sports/football.html.twig',
            [
                'pronos' => $pronos
            ]);
    }

    /**
     * @Route("/pronos/football/tomorrow", name="sports_football_tomorrow")
     * @throws \Exception
     */
    public function tomorrow(PaginatorInterface $paginator, Request $request)
    {
        $pronos = $paginator->paginate(
            $this->getDoctrine()
                ->getRepository(Prono::class)
                ->findTomorrowPronosToComeUpQuery(self::FOOTBALL),
            $request->query->getInt('page', 1),
            6
        );

        return $this->render('pages/sports/football.html.twig',
            [
                'pronos' => $pronos
            ]);
    }
}