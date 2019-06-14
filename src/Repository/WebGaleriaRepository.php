<?php

namespace App\Repository;

use App\Entity\WebGaleria;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method WebGaleria|null find($id, $lockMode = null, $lockVersion = null)
 * @method WebGaleria|null findOneBy(array $criteria, array $orderBy = null)
 * @method WebGaleria[]    findAll()
 * @method WebGaleria[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WebGaleriaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, WebGaleria::class);
    }

    // /**
    //  * @return WebGaleria[] Returns an array of WebGaleria objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?WebGaleria
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
