<?php

namespace App\Repository;

use App\Entity\CharityCase;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CharityCase|null find($id, $lockMode = null, $lockVersion = null)
 * @method CharityCase|null findOneBy(array $criteria, array $orderBy = null)
 * @method CharityCase[]    findAll()
 * @method CharityCase[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CharityCaseRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CharityCase::class);
    }

    /**
     * @return CharityCase[] Returns an array of CharityCase objects
     */

    public function orderBy($field,$dir)
    {
       $qb = $this->createQueryBuilder('c')
            ->orderBy($field, $dir)
            ->getQuery();

        return $qb->execute();
        ;
    }


    /*
    public function findOneBySomeField($value): ?CharityCase
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
