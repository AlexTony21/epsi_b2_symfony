<?php

namespace App\Repository;

use App\Entity\ATK;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ATK|null find($id, $lockMode = null, $lockVersion = null)
 * @method ATK|null findOneBy(array $criteria, array $orderBy = null)
 * @method ATK[]    findAll()
 * @method ATK[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ATKRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ATK::class);
    }

    // /**
    //  * @return ATK[] Returns an array of ATK objects
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
    public function findOneBySomeField($value): ?ATK
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
