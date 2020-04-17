<?php

namespace App\Repository;

use App\Entity\Prono;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Validator\Constraints\Date;

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
     * @return Query|null
     * @throws \Exception
     */
    public function findAllPronosToComeUpQuery($sport): ?Query
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.sport = :sport')
            ->andWhere('p.date >= :date')
            ->andWhere('p.time >= :time')
            ->setParameter('sport', $sport)
            ->setParameter('date', Date('Y-m-d'))
            ->setParameter('time', Date('H:i'))
            ->orderBy('p.odd', 'DESC')
            ->getQuery();
    }

    /**
     * @return Query|null
     * @throws \Exception
     */
    public function findTodayPronosToComeUpQuery($sport): ?Query
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.sport = :sport')
            ->andWhere('p.date = :date')
            ->setParameter('sport', $sport)
            ->setParameter('date', Date('Y-m-d'))
            ->orderBy('p.time', 'ASC')
            ->getQuery();
    }

    /**
     * @return Query|null
     * @throws \Exception
     */
    public function findTomorrowPronosToComeUpQuery($sport): ?Query
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.sport = :sport')
            ->andWhere('p.date = :date')
            ->setParameter('sport', $sport)
            ->setParameter('date', Date('Y-m-d', strtotime('+1 day')))
            ->orderBy('p.time', 'ASC')
            ->getQuery();
    }
}
