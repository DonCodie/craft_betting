<?php

namespace App\Controller\Sports;

use App\Entity\Prono;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class FootballController extends AbstractController
{
    /**
     * @Route("/pronos/football", name="sports_football")
     */
    public function index()
    {
        $pronos = $this->getDoctrine()
            ->getRepository(Prono::class)
            ->findAll();

        return $this->render('pages/sports/football.html.twig',
            [
                'pronos' => dump($pronos)
            ]);
    }

}