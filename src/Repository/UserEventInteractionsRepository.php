<?php

namespace App\Repository;

use App\Entity\UserEventInteractions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UserEventInteractions>
 *
 * @method UserEventInteractions|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserEventInteractions|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserEventInteractions[]    findAll()
 * @method UserEventInteractions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserEventInteractionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserEventInteractions::class);
    }

//    /**
//     * @return UserEventInteractions[] Returns an array of UserEventInteractions objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?UserEventInteractions
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
