<?php

namespace App\Repository;

use App\Entity\TypeofOperation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeofOperation|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeofOperation|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeofOperation[]    findAll()
 * @method TypeofOperation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeofOperationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeofOperation::class);
    }

    // /**
    //  * @return TypeofOperation[] Returns an array of TypeofOperation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeofOperation
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
