<?php

namespace App\Repository;

use App\Entity\Cabri;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cabri>
 *
 * @method Cabri|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cabri|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cabri[]    findAll()
 * @method Cabri[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CabriRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cabri::class);
    }

    //    /**
    //     * @return Cabri[] Returns an array of Cabri objects
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

    //    public function findOneBySomeField($value): ?Cabri
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
