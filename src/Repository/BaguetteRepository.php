<?php

namespace App\Repository;

use App\Entity\Baguette;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Baguette>
 *
 * @method Baguette|null find($id, $lockMode = null, $lockVersion = null)
 * @method Baguette|null findOneBy(array $criteria, array $orderBy = null)
 * @method Baguette[]    findAll()
 * @method Baguette[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BaguetteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Baguette::class);
    }

//    /**
//     * @return Baguette[] Returns an array of Baguette objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Baguette
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
