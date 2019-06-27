<?php

namespace App\Controller;

use App\Entity\Novedad;
use App\Form\NovedadType;
use App\Repository\NovedadRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/administrador/novedad")
 */
class NovedadController extends AbstractController {
	/**
	 * @Route("/", name="novedad_index", methods={"GET"})
	 */
	public function index(
		Request $request,
		NovedadRepository $novedadRepository,
		PaginatorInterface $paginator
	): Response {

		$novedads = $paginator->paginate(
			$novedadRepository->findAll(),
			$request->query->get( 'page', 1 )/* page number */,
			5/* limit per page */
		);

		$novedads->setCustomParameters( [ 'align' => 'center' ] );

		return $this->render( 'novedad/index.html.twig',
			[
				'novedads' => $novedads,
			] );
	}

	/**
	 * @Route("/new", name="novedad_new", methods={"GET","POST"})
	 */
	public function new( Request $request ): Response {
		$novedad = new Novedad();
		$form    = $this->createForm( NovedadType::class, $novedad );
		$form->handleRequest( $request );

		if ( $form->isSubmitted() && $form->isValid() ) {
			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->persist( $novedad );
			$entityManager->flush();

			$this->get( 'session' )->getFlashBag()->add(
				'success',
				'Novedad creada correctamente'
			);

			return $this->redirectToRoute( 'novedad_index' );
		}

		return $this->render( 'novedad/new.html.twig',
			[
				'novedad' => $novedad,
				'form'    => $form->createView(),
			] );
	}

	/**
	 * @Route("/{id}", name="novedad_show", methods={"GET"})
	 */
	public function show( Novedad $novedad ): Response {
		return $this->render( 'novedad/show.html.twig',
			[
				'novedad' => $novedad,
			] );
	}

	/**
	 * @Route("/{id}/edit", name="novedad_edit", methods={"GET","POST"})
	 */
	public function edit( Request $request, Novedad $novedad ): Response {
		$form = $this->createForm( NovedadType::class, $novedad );
		$form->handleRequest( $request );

		if ( $form->isSubmitted() && $form->isValid() ) {
			$this->getDoctrine()->getManager()->flush();

			$this->get( 'session' )->getFlashBag()->add(
				'success',
				'Novedad actualizada correctamente'
			);

			return $this->redirectToRoute( 'novedad_edit',
				[
					'id' => $novedad->getId(),
				] );
		}

		return $this->render( 'novedad/edit.html.twig',
			[
				'novedad' => $novedad,
				'form'    => $form->createView(),
			] );
	}

	/**
	 * @Route("/{id}", name="novedad_delete", methods={"DELETE"})
	 */
	public function delete( Request $request, Novedad $novedad ): Response {
		if ( $this->isCsrfTokenValid( 'delete' . $novedad->getId(), $request->request->get( '_token' ) ) ) {
			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->remove( $novedad );
			$entityManager->flush();
		}

		return $this->redirectToRoute( 'novedad_index' );
	}
}
