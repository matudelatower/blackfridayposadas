<?php

namespace App\Repository;

use App\Entity\Comercio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Comercio|null find( $id, $lockMode = null, $lockVersion = null )
 * @method Comercio|null findOneBy( array $criteria, array $orderBy = null )
 * @method Comercio[]    findAll()
 * @method Comercio[]    findBy( array $criteria, array $orderBy = null, $limit = null, $offset = null )
 */
class ComercioRepository extends ServiceEntityRepository {
	public function __construct( RegistryInterface $registry ) {
		parent::__construct( $registry, Comercio::class );
	}

	// /**
	//  * @return Comercio[] Returns an array of Comercio objects
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
	public function findOneBySomeField($value): ?Comercio
	{
		return $this->createQueryBuilder('c')
			->andWhere('c.exampleField = :val')
			->setParameter('val', $value)
			->getQuery()
			->getOneOrNullResult()
		;
	}
	*/

	public function buscarComercios( $filters ) {
		$qb = $this->createQueryBuilder( 'c' );
		$qb->join( 'c.rubro', 'r' );

		if ( isset( $filters['rubro'] ) ) {
			$qb->andWhere( 'r.id = :rubroId' )
			   ->setParameter( 'rubroId', $filters['rubro'] );
		}


		if ( $filters['activo'] ) {
			$qb
				->andWhere( 'c.activo = :activo' )
				->setParameter( 'activo', $filters['activo'] );
		}

		if ( $filters['s'] ) {
			$qb->andWhere(
				$qb->expr()->orX(
					$qb->expr()->like( 'UPPER(c.direccion)', 'UPPER(:criteria)' ),
					$qb->expr()->like( 'UPPER(c.nombre)', 'UPPER(:criteria)' ),
					$qb->expr()->like( 'UPPER(c.observacion)', 'UPPER(:criteria)' ),
					$qb->expr()->like( 'UPPER(r.nombre)', 'UPPER(:criteria)' )
				)
			)
			   ->setParameter( 'criteria', '%' . $filters['s'] . '%' );
		}


		return $qb;
	}
}
