<?php

namespace App\Repository;

use App\Entity\Coffretrouge;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Coffretrouge>
 *
 * @method Coffretrouge|null find($id, $lockMode = null, $lockVersion = null)
 * @method Coffretrouge|null findOneBy(array $criteria, array $orderBy = null)
 * @method Coffretrouge[]    findAll()
 * @method Coffretrouge[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoffretrougeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Coffretrouge::class);
    }

    //    /**
    //     * @return Coffretrouge[] Returns an array of Coffretrouge objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Coffretrouge
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
