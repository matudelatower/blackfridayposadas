<?php

namespace App\Repository;

use App\Entity\ContactoDireccion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ContactoDireccion|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContactoDireccion|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContactoDireccion[]    findAll()
 * @method ContactoDireccion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactoDireccionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ContactoDireccion::class);
    }

    // /**
    //  * @return ContactoDireccion[] Returns an array of ContactoDireccion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ContactoDireccion
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
