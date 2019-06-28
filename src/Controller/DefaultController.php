<?php

namespace App\Controller;

use App\Entity\Comercio;
use App\Entity\Novedad;
use App\Entity\Rubro;
use App\Entity\TipEmpresa;
use App\Entity\WebGaleria;
use App\Entity\WebTexto;
use App\Form\BuscarComerciosType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

class DefaultController extends AbstractController {
	/**
	 * @Route("/", name="web")
	 */
	public function index() {
		$criteria = [
			'activo' => true
		];
		$webTexto = $this->getDoctrine()->getRepository( WebTexto::class )->findAll();
		$galerias = $this->getDoctrine()->getRepository( WebGaleria::class )->findBy(
			$criteria
		);

		$novedades = $this->getDoctrine()->getRepository( Novedad::class )->getQbLastNovedades();

		if ( $webTexto ) {
			$webTexto = $webTexto[0];
		} else {
			$webTexto = null;
		}

		return $this->render( 'Web/index.html.twig',
			[
				'web_texto' => $webTexto,
				'galerias'  => $galerias,
				'novedades' => $novedades,

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
	public function comercios( Request $request, PaginatorInterface $paginator ) {

		$criteria = [
			'activo' => true
		];

		$form = $this->createForm( BuscarComerciosType::class,
			[],
			[
				'method' => 'GET'
			] );

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

		$form->handleRequest( $request );

		if ( $form->isSubmitted() ) {
			$data    = $form->getData();
			$em      = $this->getDoctrine();
			$filters = array_merge( $criteria, $data );
//			dump($filters);
			$comercios = $em->getRepository( Comercio::class )->buscarComercios( $filters );

		}


		$comercios = $paginator->paginate(
			$comercios,
			$request->query->get( 'page', 1 )/* page number */,
			9/* limit per page */
		);

		$comercios->setCustomParameters( [ 'align' => 'center' ] );


		return $this->render( 'Web/comercios.html.twig',
			[
				'comercios' => $comercios,
				'form'      => $form->createView()
			] );
	}

	/**
	 * @Route("/para_comercios", name="para_comercios")
	 */
	public function paraComercios( Request $request ) {

		$criteria = [
			'activo' => true
		];

		$webTexto = $this->getDoctrine()->getRepository( WebTexto::class )->findAll();

		if ( $webTexto ) {
			$webTexto = $webTexto[0];
		} else {
			$webTexto = null;
		}


		$tips = $this->getDoctrine()->getRepository( TipEmpresa::class )->findBy(
			$criteria
		);

		return $this->render( 'Web/para_comercios.html.twig',
			[
				'web_texto' => $webTexto,
				'tips'      => $tips
			] );
	}

	/**
	 * @Route("/contacto", name="contacto")
	 */
	public function contacto() {

		$contacto = $this->getDoctrine()->getRepository( WebTexto::class )->findAll();

		if ( $contacto ) {
			$contacto = $contacto[0];
		} else {
			$contacto = null;
		}

		return $this->render( 'Web/contacto.html.twig',
			[
				'contacto' => $contacto
			] );
	}

	/**
	 * @Route("/social", name="social")
	 */
	public function social() {

		$social = $this->getDoctrine()->getRepository( WebTexto::class )->findAll();

		if ( $social ) {
			$social = $social[0];
		} else {
			$social = null;
		}

		return $this->render( 'Web/social.html.twig',
			[
				'social' => $social
			] );
	}

	/**
	 * @Route("/footer-info", name="footer-info")
	 */
	public function footerInfo() {

		$footerInfo = $this->getDoctrine()->getRepository( WebTexto::class )->findAll();

		if ( $footerInfo ) {
			$footerInfo = $footerInfo[0];
		} else {
			$footerInfo = null;
		}

		return $this->render( 'Web/footer_info.html.twig',
			[
				'footerInfo' => $footerInfo
			] );
	}

	/**
	 * @Route("/novedad/{id}", name="novedad")
	 */
	public function novedad( Request $request ) {

		$novedad = $this->getDoctrine()->getRepository( Novedad::class )->findOneBy(
			[
				'id'     => $request->get( 'id' ),
				'activo' => true
			]
		);


		return $this->render( 'Web/novedad.html.twig',
			[
				'novedad' => $novedad
			] );
	}

	/**
	 * @Route("/upload_file_entry", name="upload_file_entry")
	 */
	public function uploadFileEntry( Request $request ) {

		$file = $request->files->get( 'upload' );

		$fileName = md5( uniqid() ) . '.' . $file->guessExtension();

		// Move the file to the directory where brochures are stored
		try {
			$file->move(
				$this->getParameter( 'app.path.imagenes_entradas_url' ),
				$fileName
			);
			$response = [
				"uploaded" => 1,
				"fileName" => $fileName,
				"url"      => $this->getParameter( 'app.path.imagenes_entradas' ) .'/'. $fileName

			];
		} catch ( FileException $e ) {
			// ... handle exception if something happens during file upload
			$response = [
				"uploaded" => 1,
				"fileName" => $fileName,
				"url"      => $file->getClientOriginalName(),
				"error"    => [ "message" => $e->getMessage() ]
			];
		}


		return new JsonResponse( $response );
	}

	/**
	 * @Route("/novedades", name="novedades")
	 */
	public function novedades( Request $request, PaginatorInterface $paginator ) {

		$novedades = $this->getDoctrine()->getRepository( Novedad::class )->findBy(
			[
				'activo' => true
			]
		);

		$novedades = $paginator->paginate(
			$novedades,
			$request->query->get( 'page', 1 )/* page number */,
			6/* limit per page */
		);

		$novedades->setCustomParameters( [ 'align' => 'center' ] );


		return $this->render( 'Web/novedades.html.twig',
			[
				'novedades' => $novedades
			] );
	}


}
