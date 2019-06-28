<?php

namespace App\Controller;

use App\Entity\Rubro;
use App\Form\RubroType;
use App\Repository\RubroRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/administrador/rubro")
 */
class RubroController extends AbstractController {
	/**
	 * @Route("/", name="rubro_index", methods={"GET"})
	 */
	public function index(
		Request $request,
		RubroRepository $rubroRepository,
		PaginatorInterface $paginator
	): Response {

		$rubros = $paginator->paginate(
			$rubroRepository->findAll(),
			$request->query->get( 'page', 1 )/* page number */,
			5/* limit per page */
		);

		$rubros->setCustomParameters( [ 'align' => 'center' ] );

		return $this->render( 'rubro/index.html.twig',
			[
				'rubros' => $rubros,
			] );
	}

	/**
	 * @Route("/new", name="rubro_new", methods={"GET","POST"})
	 */
	public function new( Request $request ): Response {
		$rubro = new Rubro();
		$form  = $this->createForm( RubroType::class, $rubro );
		$form->handleRequest( $request );

		if ( $form->isSubmitted() && $form->isValid() ) {
			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->persist( $rubro );
			$entityManager->flush();

			return $this->redirectToRoute( 'rubro_index' );
		}

		return $this->render( 'rubro/new.html.twig',
			[
				'rubro' => $rubro,
				'form'  => $form->createView(),
			] );
	}

	/**
	 * @Route("/{id}", name="rubro_show", methods={"GET"})
	 */
	public function show( Rubro $rubro ): Response {
		return $this->render( 'rubro/show.html.twig',
			[
				'rubro' => $rubro,
			] );
	}

	/**
	 * @Route("/{id}/edit", name="rubro_edit", methods={"GET","POST"})
	 */
	public function edit( Request $request, Rubro $rubro ): Response {
		$form = $this->createForm( RubroType::class, $rubro );
		$form->handleRequest( $request );

		if ( $form->isSubmitted() && $form->isValid() ) {
			$this->getDoctrine()->getManager()->flush();

			return $this->redirectToRoute( 'rubro_index',
				[
					'id' => $rubro->getId(),
				] );
		}

		return $this->render( 'rubro/edit.html.twig',
			[
				'rubro' => $rubro,
				'form'  => $form->createView(),
			] );
	}

	/**
	 * @Route("/{id}", name="rubro_delete", methods={"DELETE"})
	 */
	public function delete( Request $request, Rubro $rubro ): Response {
		if ( $this->isCsrfTokenValid( 'delete' . $rubro->getId(), $request->request->get( '_token' ) ) ) {
			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->remove( $rubro );
			$entityManager->flush();
		}

		return $this->redirectToRoute( 'rubro_index' );
	}
}
