<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WebTextoRepository")
 */
class WebTexto extends BaseClass
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tituloHeader;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $subTituloHeader;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $linkFormularioInscripcionComercios;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $mostrarTips;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $textoParaComercios;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTituloHeader(): ?string
    {
        return $this->tituloHeader;
    }

    public function setTituloHeader(?string $tituloHeader): self
    {
        $this->tituloHeader = $tituloHeader;

        return $this;
    }

    public function getSubTituloHeader(): ?string
    {
        return $this->subTituloHeader;
    }

    public function setSubTituloHeader(?string $subTituloHeader): self
    {
        $this->subTituloHeader = $subTituloHeader;

        return $this;
    }

    public function getLinkFormularioInscripcionComercios(): ?string
    {
        return $this->linkFormularioInscripcionComercios;
    }

    public function setLinkFormularioInscripcionComercios(?string $linkFormularioInscripcionComercios): self
    {
        $this->linkFormularioInscripcionComercios = $linkFormularioInscripcionComercios;

        return $this;
    }

    public function getMostrarTips(): ?bool
    {
        return $this->mostrarTips;
    }

    public function setMostrarTips(?bool $mostrarTips): self
    {
        $this->mostrarTips = $mostrarTips;

        return $this;
    }

    public function getTextoParaComercios(): ?string
    {
        return $this->textoParaComercios;
    }

    public function setTextoParaComercios(?string $textoParaComercios): self
    {
        $this->textoParaComercios = $textoParaComercios;

        return $this;
    }
}
