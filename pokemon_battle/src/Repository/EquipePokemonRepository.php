<?php

namespace App\Repository;

use App\Entity\EquipePokemon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EquipePokemon|null find($id, $lockMode = null, $lockVersion = null)
 * @method EquipePokemon|null findOneBy(array $criteria, array $orderBy = null)
 * @method EquipePokemon[]    findAll()
 * @method EquipePokemon[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquipePokemonRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EquipePokemon::class);
    }

    // /**
    //  * @return EquipePokemon[] Returns an array of EquipePokemon objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EquipePokemon
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
