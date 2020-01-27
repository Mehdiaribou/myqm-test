<?php

namespace App\Repository;

use App\Entity\AutoBrand;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method AutoBrand|null find($id, $lockMode = null, $lockVersion = null)
 * @method AutoBrand|null findOneBy(array $criteria, array $orderBy = null)
 * @method AutoBrand[]    findAll()
 * @method AutoBrand[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AutoBrandRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AutoBrand::class);
    }

    // /**
    //  * @return AutoBrand[] Returns an array of AutoBrand objects
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
    public function findOneBySomeField($value): ?AutoBrand
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
