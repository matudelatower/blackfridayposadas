<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WebGaleriaRepository")
 */
class WebGaleria extends BaseClass
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
     * @ORM\OneToMany(targetEntity="App\Entity\WebGaleriaImagen", mappedBy="galeria", orphanRemoval=true, cascade={"persist"})
     */
    private $webGaleriaImagens;

	public function __toString() {
		return $this->titulo;
	}
    
    public function __construct()
    {
        $this->webGaleriaImagens = new ArrayCollection();
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

    /**
     * @return Collection|WebGaleriaImagen[]
     */
    public function getWebGaleriaImagens(): Collection
    {
        return $this->webGaleriaImagens;
    }

    public function addWebGaleriaImagen(WebGaleriaImagen $webGaleriaImagen): self
    {
        if (!$this->webGaleriaImagens->contains($webGaleriaImagen)) {
            $this->webGaleriaImagens[] = $webGaleriaImagen;
            $webGaleriaImagen->setGaleria($this);
        }

        return $this;
    }

    public function removeWebGaleriaImagen(WebGaleriaImagen $webGaleriaImagen): self
    {
        if ($this->webGaleriaImagens->contains($webGaleriaImagen)) {
            $this->webGaleriaImagens->removeElement($webGaleriaImagen);
            // set the owning side to null (unless already changed)
            if ($webGaleriaImagen->getGaleria() === $this) {
                $webGaleriaImagen->setGaleria(null);
            }
        }

        return $this;
    }
}
