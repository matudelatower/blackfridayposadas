<?php

namespace App\Form;

use App\Entity\Novedad;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class NovedadType extends AbstractType {
	public function buildForm( FormBuilderInterface $builder, array $options ) {
		$builder
			->add( 'titulo' )
			->add( 'cuerpo',
				CKEditorType::class,
				[
					'config' => [ 'filebrowserUploadRoute' => 'upload_file_entry' ]

				] )
			->add( 'archivoImagenDestacada',
				VichImageType::class,
				[
					'required' => false
				] )
			->add( 'activo' );
	}

	public function configureOptions( OptionsResolver $resolver ) {
		$resolver->setDefaults( [
			'validation_groups' => false,
			'data_class'        => Novedad::class,
		] );
	}
}
