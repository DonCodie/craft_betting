<?php

namespace App\Repository;

use App\Entity\PronoComboRisky;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PronoComboRisky|null find($id, $lockMode = null, $lockVersion = null)
 * @method PronoComboRisky|null findOneBy(array $criteria, array $orderBy = null)
 * @method PronoComboRisky[]    findAll()
 * @method PronoComboRisky[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PronoComboRiskyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PronoComboRisky::class);
    }

    /**
     * @return array
     */
    public function findPronosComboRiskyResult(): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.date >= :date')
            ->setParameter('date', Date('Y-m-d'))
            ->orderBy('p.date', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
