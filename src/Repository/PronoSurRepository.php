<?php

namespace App\Repository;

use App\Entity\PronoSur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PronoSur|null find($id, $lockMode = null, $lockVersion = null)
 * @method PronoSur|null findOneBy(array $criteria, array $orderBy = null)
 * @method PronoSur[]    findAll()
 * @method PronoSur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PronoSurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PronoSur::class);
    }

    /**
     * @return array
     */
    public function findTodayPronosSafeResult(): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.date = :date')
            ->setParameter('date', Date('Y-m-d'))
            ->orderBy('p.time', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
