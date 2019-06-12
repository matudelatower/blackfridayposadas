<?php

namespace App\Controller;

use App\Entity\Comercio;
use App\Entity\Rubro;
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

		$rubros = $this->getDoctrine()->getRepository( Rubro::class )->findAll();


		return $this->render( 'Web/rubros.html.twig',
			[
				'rubros' => $rubros
			] );
	}

	/**
	 * @Route("/comercios/{rubroId}", name="comercios", defaults={"rubroId": null})
	 */
	public function comercios( Request $request ) {

		$criteria = [];


		if ( $request->get( 'rubroId' ) ) {
			$rubro    = $this->getDoctrine()->getRepository( Rubro::class )->findOneById( $request->get( 'rubroId' ) );
			$criteria = [ 'rubro' => $rubro ];
		}

		$comercios = $this->getDoctrine()->getRepository( Comercio::class )->findBy(
			$criteria
		);

		return $this->render( 'Web/comercios.html.twig',
			[
				'comercios' => $comercios
			] );
	}
}
