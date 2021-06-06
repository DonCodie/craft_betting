<?php

namespace App\Controller\Sports;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class BasketController extends AbstractController
{
    /**
     * @Route("/pronos/basket", name="sports_basket")
     */
    public function index()
    {
        return $this->render('pages/sports/basket.html.twig');
    }
}