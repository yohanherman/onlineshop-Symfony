<?php

namespace App\Repository;

use App\Entity\Reviews;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Reviews>
 *
 * @method Reviews|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reviews|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reviews[]    findAll()
 * @method Reviews[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReviewsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reviews::class);
    }

    /**
     * @return Reviews[] Returns an array of Reviews objects
     */
    public function findcommentbyIdVin($id): array
    {
        return $this->createQueryBuilder('r')
            ->select('r.commentaires ,u.pseudo')
            ->join('r.user', 'u')
            ->andWhere('r.vins= :id')
            ->setParameter('id', $id)
            //    ->orderBy('r.id', 'ASC')
            // ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }

    //    public function findOneBySomeField($value): ?Reviews
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
