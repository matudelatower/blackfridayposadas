<?php

namespace App\Controller;

use App\Entity\Comercio;
use App\Entity\Rubro;
use App\Entity\TipEmpresa;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController {
	/**
	 * @Route("/", name="web")
	 */
	public function index() {
		return $this->render( 'Web/index.html.twig',
			[

			] );
	}

	/**
	 * @Route("/consumidores", name="consumidores")
	 */
	public function consumidores() {
		return $this->render( 'Web/consumidores.html.twig',
			[

			] );
	}

	/**
	 * @Route("/rubros", name="rubros")
	 */
	public function rubros() {

		$rubros = $this->getDoctrine()->getRepository( Rubro::class )->findBy(
			[ 'activo' => true ]
		);


		return $this->render( 'Web/rubros.html.twig',
			[
				'rubros' => $rubros
			] );
	}

	/**
	 * @Route("/comercios/{rubroId}", name="comercios", defaults={"rubroId": null})
	 */
	public function comercios( Request $request ) {

		$criteria = [
			'activo' => true
		];


		if ( $request->get( 'rubroId' ) ) {
			$rubro = $this->getDoctrine()->getRepository( Rubro::class )->findOneBy(
				[
					'id'     => $request->get( 'rubroId' ),
					'activo' => true
				]
			);
			if ( $rubro ) {
				$criteria['rubro'] = $rubro;
			}
		}

		$comercios = $this->getDoctrine()->getRepository( Comercio::class )->findBy(
			$criteria
		);

		return $this->render( 'Web/comercios.html.twig',
			[
				'comercios' => $comercios
			] );
	}

	/**
	 * @Route("/para_comercios", name="para_comercios")
	 */
	public function paraComercios( Request $request ) {

		$criteria = [
			'activo' => true
		];


		$tips = $this->getDoctrine()->getRepository( TipEmpresa::class )->findBy(
			$criteria
		);

		return $this->render( 'Web/para_comercios.html.twig',
			[
				'tips' => $tips
			] );
	}
}
