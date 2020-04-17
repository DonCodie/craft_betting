<?php

namespace App\Controller\Sports;

use App\Entity\Prono;
use Symfony\Component\HttpFoundation\Response;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class BasketballController extends AbstractController
{
    const BASKETBALL = 2;
    /**
     * @Route("/pronos/basketball", name="sports_basketball")
     * @throws \Exception
     */
    public function index(PaginatorInterface $paginator, Request $request)
    {
        $pronos = $paginator->paginate(
            $this->getDoctrine()
                ->getRepository(Prono::class)
                ->findAllPronosToComeUpQuery(self::BASKETBALL),
            $request->query->getInt('page', 1),
            6
        );

        return $this->render('pages/sports/basketball.html.twig',
            [
                'pronos' => $pronos
            ]);
    }

    /**
     * @Route("/pronos/basketball/today", name="sports_basketball_today")
     * @throws \Exception
     */
    public function today(PaginatorInterface $paginator, Request $request)
    {
        $pronos = $paginator->paginate(
            $this->getDoctrine()
                ->getRepository(Prono::class)
                ->findTodayPronosToComeUpQuery(self::BASKETBALL),
            $request->query->getInt('page', 1),
            6
        );

        return $this->render('pages/sports/basketball.html.twig',
            [
                'pronos' => $pronos
            ]);
    }

    /**
     * @Route("/pronos/basketball/tomorrow", name="sports_basketball_tomorrow")
     * @throws \Exception
     */
    public function tomorrow(PaginatorInterface $paginator, Request $request)
    {
        $pronos = $paginator->paginate(
            $this->getDoctrine()
                ->getRepository(Prono::class)
                ->findTomorrowPronosToComeUpQuery(self::BASKETBALL),
            $request->query->getInt('page', 1),
            6
        );

        return $this->render('pages/sports/basketball.html.twig',
            [
                'pronos' => $pronos
            ]);
    }
}