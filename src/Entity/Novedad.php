<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NovedadRepository")
 * @Vich\Uploadable
 */
class Novedad extends BaseClass
{
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $cuerpo;

	// ... files
	/**
	 * @Vich\UploadableField(mapping="novedad_imagenes_destacadas", fileNameProperty="nombreImagenDestacada")
	 * @var File
	 */
	private $archivoImagenDestacada;

	/**
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	private $nombreImagenDestacada;

	public function setArchivoImagenDestacada( File $file = null ) {
		$this->archivoImagenDestacada = $file;

		// VERY IMPORTANT:
		// It is required that at least one field changes if you are using Doctrine,
		// otherwise the event listeners won't be called and the file is lost
		if ( $file ) {
			// if 'updatedAt' is not defined in your entity, use another property
			$this->fechaActualizacion = new \DateTime( 'now' );
		}
	}

	public function getArchivoImagenDestacada() {
		return $this->archivoImagenDestacada;
	}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getCuerpo(): ?string
    {
        return $this->cuerpo;
    }

    public function setCuerpo(?string $cuerpo): self
    {
        $this->cuerpo = $cuerpo;

        return $this;
    }

	/**
	 * @return mixed
	 */
	public function getNombreImagenDestacada() {
		return $this->nombreImagenDestacada;
	}

	/**
	 * @param mixed $nombreImagenDestacada
	 */
	public function setNombreImagenDestacada( $nombreImagenDestacada ): void {
		$this->nombreImagenDestacada = $nombreImagenDestacada;
	}


}
