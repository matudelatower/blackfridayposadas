<?php

namespace App\Repository;

use App\Entity\WebGaleriaImagen;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method WebGaleriaImagen|null find($id, $lockMode = null, $lockVersion = null)
 * @method WebGaleriaImagen|null findOneBy(array $criteria, array $orderBy = null)
 * @method WebGaleriaImagen[]    findAll()
 * @method WebGaleriaImagen[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WebGaleriaImagenRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, WebGaleriaImagen::class);
    }

    // /**
    //  * @return WebGaleriaImagen[] Returns an array of WebGaleriaImagen objects
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
    public function findOneBySomeField($value): ?WebGaleriaImagen
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
