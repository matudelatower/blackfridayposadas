<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WebGaleriaImagenRepository")
 * @Vich\Uploadable
 */
class WebGaleriaImagen extends BaseClass {
	/**
	 * @ORM\Id()
	 * @ORM\GeneratedValue()
	 * @ORM\Column(type="integer")
	 */
	private $id;

	/**
	 * @ORM\Column(type="string", length=255)
	 */
	private $titulo;

	/**
	 * @ORM\ManyToOne(targetEntity="App\Entity\WebGaleria", inversedBy="webGaleriaImagens")
	 * @ORM\JoinColumn(nullable=false)
	 */
	private $galeria;

	/**
	 * @Vich\UploadableField(mapping="imagenes_galerias", fileNameProperty="nombreImagen")
	 * @var File
	 */
	private $archivoLogo;

	/**
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	private $nombreImagen;

	public function setArchivoLogo( File $file = null ) {
		$this->archivoLogo = $file;

		// VERY IMPORTANT:
		// It is required that at least one field changes if you are using Doctrine,
		// otherwise the event listeners won't be called and the file is lost
		if ( $file ) {
			// if 'updatedAt' is not defined in your entity, use another property
			$this->fechaActualizacion = new \DateTime( 'now' );
		}
	}

	public function getArchivoLogo() {
		return $this->archivoLogo;
	}

	public function __toString() {
		return $this->titulo;
	}

	public function getId(): ?int {
		return $this->id;
	}

	public function getTitulo(): ?string {
		return $this->titulo;
	}

	public function setTitulo( string $titulo ): self {
		$this->titulo = $titulo;

		return $this;
	}

	public function getGaleria(): ?WebGaleria {
		return $this->galeria;
	}

	public function setGaleria( ?WebGaleria $galeria ): self {
		$this->galeria = $galeria;

		return $this;
	}

	public function getNombreImagen(): ?string {
		return $this->nombreImagen;
	}

	public function setNombreImagen( ?string $nombreImagen ): self {
		$this->nombreImagen = $nombreImagen;

		return $this;
	}
}
