<?php

namespace App\Controller\Sports;

use App\Entity\Prono;
use Symfony\Component\HttpFoundation\Response;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class TennisController extends AbstractController
{
    const TENNIS = 3;
    /**
     * @Route("/pronos/tennis", name="sports_tennis")
     * @throws \Exception
     */
    public function index(PaginatorInterface $paginator, Request $request)
    {
        $pronos = $paginator->paginate(
            $this->getDoctrine()
                ->getRepository(Prono::class)
                ->findAllPronosToComeUpQuery(self::TENNIS),
            $request->query->getInt('page', 1),
            6
        );

        return $this->render('pages/sports/tennis.html.twig',
            [
                'pronos' => $pronos
            ]);
    }

    /**
     * @Route("/pronos/tennis/today", name="sports_tennis_today")
     * @throws \Exception
     */
    public function today(PaginatorInterface $paginator, Request $request)
    {
        $pronos = $paginator->paginate(
            $this->getDoctrine()
                ->getRepository(Prono::class)
                ->findTodayPronosToComeUpQuery(self::TENNIS),
            $request->query->getInt('page', 1),
            6
        );

        return $this->render('pages/sports/tennis.html.twig',
            [
                'pronos' => $pronos
            ]);
    }

    /**
     * @Route("/pronos/tennis/tomorrow", name="sports_tennis_tomorrow")
     * @throws \Exception
     */
    public function tomorrow(PaginatorInterface $paginator, Request $request)
    {
        $pronos = $paginator->paginate(
            $this->getDoctrine()
                ->getRepository(Prono::class)
                ->findTomorrowPronosToComeUpQuery(self::TENNIS),
            $request->query->getInt('page', 1),
            6
        );

        return $this->render('pages/sports/tennis.html.twig',
            [
                'pronos' => $pronos
            ]);
    }
}