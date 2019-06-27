<?php

namespace App\Form;

use App\Entity\WebTexto;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WebTextoType extends AbstractType {
	public function buildForm( FormBuilderInterface $builder, array $options ) {
		$builder
			->add( 'tituloHeader' )
			->add( 'subTituloHeader' )
			->add( 'linkFormularioInscripcionComercios' )
			->add( 'mostrarTips' )
			->add( 'textoParaComercios',
				CKEditorType::class,
				[
					'config' => [ 'filebrowserUploadRoute' => 'upload_file_entry' ]

				] )
			->add( 'concejos', CKEditorType::class )
			->add( 'acercaDe', CKEditorType::class )
			->add( 'instagram' )
			->add( 'facebook' )
			->add( 'twitter' )
			->add( 'youtube' )
			->add( 'contactoDireccion' )
			->add( 'contactoTelefono' )
			->add( 'contactoWhatsapp' );
	}

	public function configureOptions( OptionsResolver $resolver ) {
		$resolver->setDefaults( [
			'data_class' => WebTexto::class,
		] );
	}
}
