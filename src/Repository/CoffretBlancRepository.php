<?php

namespace App\Repository;

use App\Entity\CoffretBlanc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CoffretBlanc>
 *
 * @method CoffretBlanc|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoffretBlanc|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoffretBlanc[]    findAll()
 * @method CoffretBlanc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoffretBlancRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoffretBlanc::class);
    }

    //    /**
    //     * @return CoffretBlanc[] Returns an array of CoffretBlanc objects
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

    //    public function findOneBySomeField($value): ?CoffretBlanc
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
