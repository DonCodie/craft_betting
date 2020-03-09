<?php

namespace App\Controller\Sports;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class FootballController extends AbstractController
{
    /**
     * @Route("/football", name="sports_football")
     */
    public function index()
    {
        return $this->render('pages/sports/football.html.twig');
    }

}