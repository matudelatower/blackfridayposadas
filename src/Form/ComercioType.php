<?php

namespace App\Form;

use App\Entity\Comercio;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
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
			->add( 'rubro' )
			->add( 'activo' )
		;
	}

	public function configureOptions( OptionsResolver $resolver ) {
		$resolver->setDefaults( [
			'validation_groups' => false,
			'data_class'        => Comercio::class,
		] );
	}
}
