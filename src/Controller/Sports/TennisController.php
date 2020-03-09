<?php

namespace App\Controller\Sports;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class TennisController extends AbstractController
{
    /**
     * @Route("/tennis", name="sports_tennis")
     */
    public function index()
    {
        return $this->render('pages/sports/tennis.html.twig');
    }
}