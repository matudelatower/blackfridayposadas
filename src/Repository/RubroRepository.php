<?php

namespace App\Repository;

use App\Entity\Rubro;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Rubro|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rubro|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rubro[]    findAll()
 * @method Rubro[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RubroRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Rubro::class);
    }

    // /**
    //  * @return Rubro[] Returns an array of Rubro objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Rubro
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
