<?php

namespace App\Controller;

use App\Entity\Comercio;
use App\Form\ComercioType;
use App\Repository\ComercioRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/administrador/comercio")
 */
class ComercioController extends AbstractController {
	/**
	 * @Route("/", name="comercio_index", methods={"GET"})
	 */
	public function index(
		Request $request,
		ComercioRepository $comercioRepository,
		PaginatorInterface $paginator
	): Response {

		$comercios = $paginator->paginate(
			$comercioRepository->findAll(),
			$request->query->get( 'page', 1 )/* page number */,
			5/* limit per page */
		);

		$comercios->setCustomParameters( [ 'align' => 'center' ] );

		return $this->render( 'comercio/index.html.twig',
			[
				'comercios' => $comercios
			] );
	}

	/**
	 * @Route("/new", name="comercio_new", methods={"GET","POST"})
	 */
	public function new( Request $request ): Response {
		$comercio = new Comercio();
		$form     = $this->createForm( ComercioType::class, $comercio );
		$form->handleRequest( $request );

		if ( $form->isSubmitted() && $form->isValid() ) {
			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->persist( $comercio );
			$entityManager->flush();

			$this->get( 'session' )->getFlashBag()->add(
				'success',
				'Comercio creado correctamente'
			);

			return $this->redirectToRoute( 'comercio_edit',
				[
					'id' => $comercio->getId()
				] );
		}

		return $this->render( 'comercio/new.html.twig',
			[
				'comercio' => $comercio,
				'form'     => $form->createView(),
			] );
	}

	/**
	 * @Route("/{id}", name="comercio_show", methods={"GET"})
	 */
	public function show( Comercio $comercio ): Response {
		return $this->render( 'comercio/show.html.twig',
			[
				'comercio' => $comercio,
			] );
	}

	/**
	 * @Route("/{id}/edit", name="comercio_edit", methods={"GET","POST"})
	 */
	public function edit( Request $request, Comercio $comercio ): Response {
		$form = $this->createForm( ComercioType::class, $comercio );
		$form->handleRequest( $request );

		if ( $form->isSubmitted() && $form->isValid() ) {
			$this->getDoctrine()->getManager()->flush();

			$this->get( 'session' )->getFlashBag()->add(
				'success',
				'Comercio actualizado correctamente'
			);

			return $this->redirectToRoute( 'comercio_edit',
				[
					'id' => $comercio->getId(),
				] );
		}

		return $this->render( 'comercio/edit.html.twig',
			[
				'comercio' => $comercio,
				'form'     => $form->createView(),
			] );
	}

	/**
	 * @Route("/{id}", name="comercio_delete", methods={"DELETE"})
	 */
	public function delete( Request $request, Comercio $comercio ): Response {
		if ( $this->isCsrfTokenValid( 'delete' . $comercio->getId(), $request->request->get( '_token' ) ) ) {
			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->remove( $comercio );
			$entityManager->flush();
		}

		return $this->redirectToRoute( 'comercio_index' );
	}
}
