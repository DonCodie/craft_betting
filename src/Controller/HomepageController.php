<?php

namespace App\Controller;

use App\Entity\PronoComboRisky;
use App\Entity\PronoSur;
use App\Entity\PronoComboSafe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class HomepageController extends AbstractController
{
    /**
     * @Route("/accueil", name="homepage")
     */
    public function index()
    {
        $todayPronoSafe = $this->getDoctrine()
            ->getManager()
            ->getRepository(PronoSur::class)
            ->findTodayPronosSafeResult();

        $pronoComboSafe = $this->getDoctrine()
            ->getManager()
            ->getRepository(PronoComboSafe::class)
            ->findPronosComboSafeResult();

        $pronoComboRisky = $this->getDoctrine()
            ->getManager()
            ->getRepository(PronoComboRisky::class)
            ->findPronosComboRiskyResult();

        return $this->render('pages/homepage/homepage.html.twig', [
            'todayPronoSafes' => $todayPronoSafe,
            'pronoComboSafes' => $pronoComboSafe,
            'pronoComboRiskys' => $pronoComboRisky
        ]);
    }
}
