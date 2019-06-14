<?php

namespace App\Repository;

use App\Entity\WebTexto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method WebTexto|null find($id, $lockMode = null, $lockVersion = null)
 * @method WebTexto|null findOneBy(array $criteria, array $orderBy = null)
 * @method WebTexto[]    findAll()
 * @method WebTexto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WebTextoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, WebTexto::class);
    }

    // /**
    //  * @return WebTexto[] Returns an array of WebTexto objects
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
    public function findOneBySomeField($value): ?WebTexto
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
