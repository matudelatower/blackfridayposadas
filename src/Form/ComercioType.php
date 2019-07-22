<?php

namespace App\Form;

use App\Entity\Comercio;
use App\Entity\Rubro;
use Doctrine\ORM\EntityRepository;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ComercioType extends AbstractType {
	public function buildForm( FormBuilderInterface $builder, array $options ) {
		$builder
			->add( 'nombre' )
			->add( 'direccion' )
			->add( 'observacion', CKEditorType::class )
			->add( 'archivoLogo',
				VichImageType::class,
				[
					'required' => false
				] )
			->add( 'linkGoogleMaps' )
			->add( 'rubro',
				EntityType::class,
				[
					'class'         => Rubro::class,
					'query_builder' => function ( EntityRepository $er ) {
						return $er->createQueryBuilder( 'r' )
						          ->orderBy( 'r.nombre', 'ASC' );
					},
					'placeholder'=> 'Seleccionar Rubro...'
				] )
			->add( 'activo' );
	}

	public function configureOptions( OptionsResolver $resolver ) {
		$resolver->setDefaults( [
			'validation_groups' => false,
			'data_class'        => Comercio::class,
		] );
	}
}
