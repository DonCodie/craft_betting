<?php

namespace App\Repository;

use App\Entity\Prono;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Prono|null find($id, $lockMode = null, $lockVersion = null)
 * @method Prono|null findOneBy(array $criteria, array $orderBy = null)
 * @method Prono[]    findAll()
 * @method Prono[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PronoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Prono::class);
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function findAllToComeUp()
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.datetime >= :datetime')
            ->setParameter('datetime', new \DateTime())
            ->orderBy('p.datetime', 'ASC')
            ->getQuery()
            ->getResult();
    }

}
