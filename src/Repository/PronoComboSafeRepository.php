<?php

namespace App\Repository;

use App\Entity\PronoComboSafe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PronoComboSafe|null find($id, $lockMode = null, $lockVersion = null)
 * @method PronoComboSafe|null findOneBy(array $criteria, array $orderBy = null)
 * @method PronoComboSafe[]    findAll()
 * @method PronoComboSafe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PronoComboSafeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PronoComboSafe::class);
    }

    /**
     * @return array
     */
    public function findPronosComboSafeResult(): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.date >= :date')
            ->setParameter('date', Date('Y-m-d'))
            ->orderBy('p.date', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
