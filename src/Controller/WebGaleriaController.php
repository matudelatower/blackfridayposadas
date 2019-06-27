<?php

namespace App\Controller;

use App\Entity\WebGaleria;
use App\Form\WebGaleriaType;
use App\Repository\WebGaleriaRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/administrador/web/galeria")
 */
class WebGaleriaController extends AbstractController {
	/**
	 * @Route("/", name="web_galeria_index", methods={"GET"})
	 */
	public function index(
		Request $request,
		WebGaleriaRepository $webGaleriaRepository,
		PaginatorInterface $paginator
	): Response {

		$galerias = $paginator->paginate(
			$webGaleriaRepository->findAll(),
			$request->query->get( 'page', 1 )/* page number */,
			5/* limit per page */
		);

		$galerias->setCustomParameters( [ 'align' => 'center' ] );

		return $this->render( 'web_galeria/index.html.twig',
			[
				'web_galerias' => $galerias,
			] );
	}

	/**
	 * @Route("/new", name="web_galeria_new", methods={"GET","POST"})
	 */
	public function new( Request $request ): Response {
		$webGalerium = new WebGaleria();
		$form        = $this->createForm( WebGaleriaType::class, $webGalerium );
		$form->handleRequest( $request );

		if ( $form->isSubmitted() && $form->isValid() ) {
			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->persist( $webGalerium );
			$entityManager->flush();

			$this->get( 'session' )->getFlashBag()->add(
				'success',
				'Galería creada correctamente'
			);

			return $this->redirectToRoute( 'web_galeria_index' );
		}

		return $this->render( 'web_galeria/new.html.twig',
			[
				'web_galerium' => $webGalerium,
				'form'         => $form->createView(),
			] );
	}

	/**
	 * @Route("/{id}", name="web_galeria_show", methods={"GET"})
	 */
	public function show( WebGaleria $webGalerium ): Response {
		return $this->render( 'web_galeria/show.html.twig',
			[
				'web_galerium' => $webGalerium,
			] );
	}

	/**
	 * @Route("/{id}/edit", name="web_galeria_edit", methods={"GET","POST"})
	 */
	public function edit( Request $request, WebGaleria $webGalerium ): Response {
		$form = $this->createForm( WebGaleriaType::class, $webGalerium );
		$form->handleRequest( $request );

		if ( $form->isSubmitted() && $form->isValid() ) {
			$this->getDoctrine()->getManager()->flush();

			$this->get( 'session' )->getFlashBag()->add(
				'success',
				'Galeria actualizada correctamente'
			);

			return $this->redirectToRoute( 'web_galeria_edit',
				[
					'id' => $webGalerium->getId(),
				] );
		}

		return $this->render( 'web_galeria/edit.html.twig',
			[
				'web_galerium' => $webGalerium,
				'form'         => $form->createView(),
			] );
	}

	/**
	 * @Route("/{id}", name="web_galeria_delete", methods={"DELETE"})
	 */
	public function delete( Request $request, WebGaleria $webGalerium ): Response {
		if ( $this->isCsrfTokenValid( 'delete' . $webGalerium->getId(), $request->request->get( '_token' ) ) ) {
			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->remove( $webGalerium );
			$entityManager->flush();
		}

		return $this->redirectToRoute( 'web_galeria_index' );
	}
}
