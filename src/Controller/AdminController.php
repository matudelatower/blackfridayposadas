<?php

namespace App\Controller;


use App\Entity\WebTexto;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use FOS\UserBundle\Model\UserManagerInterface;


class AdminController extends EasyAdminController {

	private $userManager;

	public function __construct( UserManagerInterface $userManager ) {
		$this->userManager = $userManager;
	}

//	public function listUsuarioAction()
//	{
//		if (!$this->isGranted("ROLE_ADMIN")) {
//			return $this->redirectToRoute('administrador');
////			return $this->redirectToRoute('administrador', ['entity' => 'Usuario', 'action' => 'edit', 'id' => $this->getUser()->getId()]);
//		}
//		return $this->listAction();
//	}

	public function createNewUsuarioEntity() {
		return $this->userManager->createUser();
	}

	public function updateUsuarioEntity( $user ) {
		$this->userManager->updateUser( $user, false );
		parent::updateEntity( $user );
	}

	public function prePersistUsuarioEntity( $user ) {
		$this->userManager->updateUser( $user, false );
	}

	public function preUpdateUsuarioEntity( $user ) {
		$this->userManager->updateUser( $user, false );
	}

	public function listWebTextoAction() {
		$webTexto = $this->getDoctrine()->getRepository( WebTexto::class )->findAll();

		if ( ! $webTexto ) {
			return $this->redirectToRoute( 'easyadmin',
				[ 'entity' => 'WebTexto', 'action' => 'new' ] );
		} else {
			return $this->redirectToRoute( 'easyadmin',
				[ 'entity' => 'WebTexto', 'action' => 'edit', 'id' => $webTexto[0]->getId() ] );
		}

	}
}