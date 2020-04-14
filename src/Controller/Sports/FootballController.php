<?php

namespace App\Controller\Sports;

use App\Entity\Prono;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class FootballController extends AbstractController
{
    /**
     * @Route("/pronos/football", name="sports_football")
     * @throws \Exception
     */
    public function index()
    {
        $allPronos = $this->getDoctrine()
            ->getRepository(Prono::class)
            ->findAllToComeUp();

        return $this->render('pages/sports/football.html.twig',
            [
                'allPronos' => $allPronos
            ]);
    }

}