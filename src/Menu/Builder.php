<?php

namespace App\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;


class Builder {

	private $factory;
	private $authorizationChecker;

	/**
	 * @param FactoryInterface $factory
	 *
	 * Add any other dependency you need
	 */
	public function __construct( FactoryInterface $factory, AuthorizationCheckerInterface $authorizationChecker ) {
		$this->factory              = $factory;
		$this->authorizationChecker = $authorizationChecker;
	}

	public function mainMenu( array $options ) {
//		$menu = $factory->createItem('root');
//
//		$menu->addChild('Home', array('route' => 'app_homepage'));

		$menu = $this->factory->createItem(
			'root',
			array(
				'childrenAttributes' => array(
					'class'          => 'nav nav-pills nav-sidebar flex-column',
					'data-widget'    => 'treeview',
					'role'           => 'menu',
					'data-accordion' => 'false'
				),
			)
		);

		$menu->addChild(
			'MENU PRINCIPAL'
		)->setAttribute( 'class', 'nav-header' );

		$menu->addChild(
			'Ver Web',
			[ 'route' => 'web' ]
		)->setAttribute( 'class', 'nav-item' )
		     ->setLinkAttribute( 'class', 'nav-link' )
		     ->setExtra( 'icon', 'fa fa-globe' );

		if ( $this->authorizationChecker->isGranted( 'ROLE_USER' ) ) {

			$keyAdministracion = 'ADMINISTRACIÓN';
			$menu->addChild(
				$keyAdministracion,
				array(
					'childrenAttributes' => array(
						'class' => 'nav nav-treeview',
					),
				)
			)
			     ->setUri( '#' )
			     ->setExtra( 'icon', 'fas fa-folder-open' )
			     ->setAttribute( 'class', 'nav-item has-treeview' )
			     ->setLinkAttribute( 'class', 'nav-link' );

			if ( $this->authorizationChecker->isGranted( 'ROLE_ADMIN' ) ) {

				$menu[ $keyAdministracion ]
					->addChild(
						'Parámetros',
						array(
							'route' => 'easyadmin',
						)
					)
					->setAttribute( 'class', 'nav-item' )
					->setLinkAttribute( 'class', 'nav-link' );

			}


			if ( $this->authorizationChecker->isGranted( 'ROLE_ADMINISTRACION' ) ) {

				$menu[ $keyAdministracion ]
					->addChild(
						'Web',
						array(
							'route' => 'web_texto_index',
						)
					)
					->setAttribute( 'class', 'nav-item' )
					->setLinkAttribute( 'class', 'nav-link' );
			}

			if ( $this->authorizationChecker->isGranted( 'ROLE_PRENSA' ) ) {
				$menu[ $keyAdministracion ]
					->addChild(
						'Novedades',
						array(
							'route' => 'novedad_index',
						)
					)
					->setAttribute( 'class', 'nav-item' )
					->setLinkAttribute( 'class', 'nav-link' );

				$menu[ $keyAdministracion ]
					->addChild(
						'Galerías',
						array(
							'route' => 'web_galeria_index',
						)
					)
					->setAttribute( 'class', 'nav-item' )
					->setLinkAttribute( 'class', 'nav-link' );


			}

			// usuarios

			$keyUsuarios = 'USUARIO';
			$menu->addChild(
				$keyUsuarios,
				array(
					'childrenAttributes' => array(
						'class' => 'nav nav-treeview',
					),
				)
			)
			     ->setUri( '#' )
			     ->setExtra( 'icon', 'fa fa-user' )
			     ->setAttribute( 'class', 'nav-item has-treeview' )
			     ->setLinkAttribute( 'class', 'nav-link' );

			$menu[ $keyUsuarios ]
				->addChild(
					'Perfil',
					array(
						'route' => 'fos_user_profile_show',
					)
				)
				->setAttribute( 'class', 'nav-item' )
				->setLinkAttribute( 'class', 'nav-link' );

			$menu[ $keyUsuarios ]
				->addChild(
					'Cambiar Password',
					array(
						'route' => 'fos_user_change_password',
					)
				)
				->setAttribute( 'class', 'nav-item' )
				->setLinkAttribute( 'class', 'nav-link' );

			$menu[ $keyUsuarios ]
				->addChild(
					'Cerrar sesión',
					array(
						'route' => 'fos_user_security_logout',
					)
				)
				->setAttribute( 'class', 'nav-item' )
				->setExtra( 'icon', 'fas fa-sign-out-alt' )
				->setLinkAttribute( 'class', 'nav-link' );

		}


		return $menu;
	}
}