<?php

namespace App\Repository;

use App\Entity\AddMoney;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AddMoney|null find($id, $lockMode = null, $lockVersion = null)
 * @method AddMoney|null findOneBy(array $criteria, array $orderBy = null)
 * @method AddMoney[]    findAll()
 * @method AddMoney[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AddMoneyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AddMoney::class);
    }

    // /**
    //  * @return AddMoney[] Returns an array of AddMoney objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AddMoney
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
