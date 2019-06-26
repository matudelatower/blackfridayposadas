<?php

namespace App\Form;

use App\Entity\WebGaleriaImagen;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class WebGaleriaImagenType extends AbstractType {
	public function buildForm( FormBuilderInterface $builder, array $options ) {
		$builder
			->add( 'titulo' )
			->add('test', CKEditorType::class, [
				'filebrowsers'
			])
			->add( 'archivoLogo',
				VichImageType::class,
				[
					'required' => false
				] );
	}

	public function configureOptions( OptionsResolver $resolver ) {
		$resolver->setDefaults( [
			'data_class' => WebGaleriaImagen::class,
		] );
	}
}
