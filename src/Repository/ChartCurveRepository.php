<?php

namespace App\Repository;

use App\Entity\ChartCurve;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ChartCurve|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChartCurve|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChartCurve[]    findAll()
 * @method ChartCurve[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChartCurveRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChartCurve::class);
    }

    /**
     * @return array
     */
    public function findChartCurveResult(): array
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.id', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
