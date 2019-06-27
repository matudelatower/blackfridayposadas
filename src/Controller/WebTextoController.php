<?php

namespace App\Controller;

use App\Entity\WebTexto;
use App\Form\WebTextoType;
use App\Repository\WebTextoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/administrador/web/texto")
 */
class WebTextoController extends AbstractController {
	/**
	 * @Route("/", name="web_texto_index", methods={"GET"})
	 */
	public function index( WebTextoRepository $webTextoRepository ): Response {

		$webTexto = $this->getDoctrine()->getRepository( WebTexto::class )->findAll();

		if ( ! $webTexto ) {
			return $this->redirectToRoute( 'web_texto_new' );
		} else {
			return $this->redirectToRoute( 'web_texto_edit',
				[ 'id' => $webTexto[0]->getId() ] );
		}

//        return $this->render('web_texto/index.html.twig', [
//            'web_textos' => $webTextoRepository->findAll(),
//        ]);
	}

	/**
	 * @Route("/new", name="web_texto_new", methods={"GET","POST"})
	 */
	public function new( Request $request ): Response {
		$webTexto = new WebTexto();
		$form     = $this->createForm( WebTextoType::class, $webTexto );
		$form->handleRequest( $request );

		if ( $form->isSubmitted() && $form->isValid() ) {
			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->persist( $webTexto );
			$entityManager->flush();

			return $this->redirectToRoute( 'web_texto_index' );
		}

		return $this->render( 'web_texto/new.html.twig',
			[
				'web_texto' => $webTexto,
				'form'      => $form->createView(),
			] );
	}

	/**
	 * @Route("/{id}", name="web_texto_show", methods={"GET"})
	 */
	public function show( WebTexto $webTexto ): Response {
		return $this->render( 'web_texto/show.html.twig',
			[
				'web_texto' => $webTexto,
			] );
	}

	/**
	 * @Route("/{id}/edit", name="web_texto_edit", methods={"GET","POST"})
	 */
	public function edit( Request $request, WebTexto $webTexto ): Response {
		$form = $this->createForm( WebTextoType::class, $webTexto );
		$form->handleRequest( $request );

		if ( $form->isSubmitted() && $form->isValid() ) {
			$this->getDoctrine()->getManager()->flush();

			$this->get( 'session' )->getFlashBag()->add(
				'success',
				'Actualizado correctamente'
			);

			return $this->redirectToRoute( 'web_galeria_edit',
				[
					'id' => $webTexto->getId(),
				] );
		}

		return $this->render( 'web_texto/edit.html.twig',
			[
				'web_texto' => $webTexto,
				'form'      => $form->createView(),
			] );
	}

	/**
	 * @Route("/{id}", name="web_texto_delete", methods={"DELETE"})
	 */
	public function delete( Request $request, WebTexto $webTexto ): Response {
		if ( $this->isCsrfTokenValid( 'delete' . $webTexto->getId(), $request->request->get( '_token' ) ) ) {
			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->remove( $webTexto );
			$entityManager->flush();
		}

		return $this->redirectToRoute( 'web_texto_index' );
	}
}
