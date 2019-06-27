<?php

namespace App\Form;

use App\Entity\WebGaleria;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WebGaleriaType extends AbstractType {
	public function buildForm( FormBuilderInterface $builder, array $options ) {
		$builder
			->add( 'titulo' )
			->add( 'webGaleriaImagens',
				BootstrapCollectionType::class,
				[
					'allow_add'    => true,
					'allow_delete' => true,
					'by_reference' => false,
					'label'        => 'Fotos',
					'entry_type'   => WebGaleriaImagenType::class
				] )
			->add( 'activo' );
	}

	public function configureOptions( OptionsResolver $resolver ) {
		$resolver->setDefaults( [
			'validation_groups' => false,
			'data_class'        => WebGaleria::class,
		] );
	}
}
