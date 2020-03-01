<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomepageController extends AbstractController
{
    /**
     * @Route("/accueil", name="homepage")
     */
    public function index()
    {
        return $this->render('pages/homepage/homepage.html.twig');
    }
}