<?php

namespace App\Form;

use App\Entity\Rubro;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BuscarComerciosType extends AbstractType {
	public function buildForm( FormBuilderInterface $builder, array $options ) {
		$builder
			->add( 's',
				TextType::class,
				[
//					'attr' => [ 'placeholder' => 'Buscar...' ],
					'label' => 'Nombre de comercio'
				] )
			->add( 'oRubro',
				EntityType::class,
				[
					'class'       => Rubro::class,
					'attr'        => [
						'class' => 'select2'
					],
					'placeholder' => 'Seleccionar rubro...',
					'label'       => 'Rubro'

				] )
			->add( 'btnBuscar',
				SubmitType::class,
				[
					'icon' => '<i class="fas fa-search"></i>',
					'attr' => [ 'class' => 'btn btn-outline-secondary' ]
				] );
	}

	public function configureOptions( OptionsResolver $resolver ) {
		$resolver->setDefaults( [
			'required' => false
		] );
	}
}
