<?php

namespace App\Controller;

use App\Entity\ChartCurve;
use App\Entity\PronoComboRisky;
use App\Entity\PronoSur;
use App\Entity\PronoComboSafe;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;


class HomepageController extends AbstractController
{

    /**
     * @Route("/accueil", name="homepage")
     */
    public function index(ManagerRegistry $managerRegistry, SerializerInterface $serializer)
    {
        $todayPronoSafe = $managerRegistry
            ->getRepository(PronoSur::class)
            ->findTodayPronosSafeResult();

        $pronoComboSafe = $managerRegistry
            ->getRepository(PronoComboSafe::class)
            ->findPronosComboSafeResult();

        $pronoComboRisky = $managerRegistry
            ->getRepository(PronoComboRisky::class)
            ->findPronosComboRiskyResult();

        $chartCurve = $managerRegistry
            ->getRepository(ChartCurve::class)
            ->findChartCurveResult();

        return $this->render('pages/homepage/homepage.html.twig', [
            'todayPronoSafes' => $todayPronoSafe,
            'pronoComboSafes' => $pronoComboSafe,
            'pronoComboRiskys' => $pronoComboRisky,
            'chartCurves' => $serializer->serialize($chartCurve, 'json', [
                'circular_reference_handler' => function ($object) {
                    return $object->getId();
                }
            ])
        ]);
    }
}
