<?php

namespace App\Repository;

use App\Entity\ChartCurveResult;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ChartCurveResult|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChartCurveResult|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChartCurveResult[]    findAll()
 * @method ChartCurveResult[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChartCurveResultRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChartCurveResult::class);
    }

    // /**
    //  * @return ChartCurveResult[] Returns an array of ChartCurveResult objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ChartCurveResult
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
