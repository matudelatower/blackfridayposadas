<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ComercioRepository")
 * @Vich\Uploadable
 */
class Comercio extends BaseClass {
	/**
	 * @ORM\Id()
	 * @ORM\GeneratedValue()
	 * @ORM\Column(type="integer")
	 */
	private $id;

	/**
	 * @ORM\Column(type="string", length=255)
	 */
	private $nombre;

	/**
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	private $direccion;

	/**
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	private $latitud;

	/**
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	private $longitud;

	/**
	 * @ORM\Column(type="text", nullable=true)
	 */
	private $observacion;

	/**
	 * @ORM\ManyToOne(targetEntity="App\Entity\Rubro", inversedBy="comercios")
	 */
	private $rubro;


	// ... files
	/**
	 * @Vich\UploadableField(mapping="logos_comercios", fileNameProperty="nombreLogo")
	 * @var File
	 */
	private $archivoLogo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nombreLogo;

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
         		return $this->nombre;
         	}

	public function getId(): ?int {
         		return $this->id;
         	}

	public function getNombre(): ?string {
         		return $this->nombre;
         	}

	public function setNombre( string $nombre ): self {
         		$this->nombre = $nombre;
         
         		return $this;
         	}

	public function getDireccion(): ?string {
         		return $this->direccion;
         	}

	public function setDireccion( ?string $direccion ): self {
         		$this->direccion = $direccion;
         
         		return $this;
         	}

	public function getLatitud(): ?string {
         		return $this->latitud;
         	}

	public function setLatitud( ?string $latitud ): self {
         		$this->latitud = $latitud;
         
         		return $this;
         	}

	public function getLongitud(): ?string {
         		return $this->longitud;
         	}

	public function setLongitud( ?string $longitud ): self {
         		$this->longitud = $longitud;
         
         		return $this;
         	}

	public function getObservacion(): ?string {
         		return $this->observacion;
         	}

	public function setObservacion( ?string $observacion ): self {
         		$this->observacion = $observacion;
         
         		return $this;
         	}

	public function getRubro(): ?Rubro {
         		return $this->rubro;
         	}

	public function setRubro( ?Rubro $rubro ): self {
         		$this->rubro = $rubro;
         
         		return $this;
         	}

    public function getNombreLogo(): ?string
    {
        return $this->nombreLogo;
    }

    public function setNombreLogo(?string $nombreLogo): self
    {
        $this->nombreLogo = $nombreLogo;

        return $this;
    }
}
