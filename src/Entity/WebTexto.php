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

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $concejos;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $acercaDe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $instagram;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $facebook;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $twitter;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $youtube;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contactoDireccion;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contactoTelefono;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contactoWhatsapp;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tituloConsejos;


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

    public function getConcejos(): ?string
    {
        return $this->concejos;
    }

    public function setConcejos(?string $concejos): self
    {
        $this->concejos = $concejos;

        return $this;
    }

    public function getAcercaDe(): ?string
    {
        return $this->acercaDe;
    }

    public function setAcercaDe(?string $acercaDe): self
    {
        $this->acercaDe = $acercaDe;

        return $this;
    }

    public function getInstagram(): ?string
    {
        return $this->instagram;
    }

    public function setInstagram(?string $instagram): self
    {
        $this->instagram = $instagram;

        return $this;
    }

    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    public function setFacebook(?string $facebook): self
    {
        $this->facebook = $facebook;

        return $this;
    }

    public function getTwitter(): ?string
    {
        return $this->twitter;
    }

    public function setTwitter(?string $twitter): self
    {
        $this->twitter = $twitter;

        return $this;
    }

    public function getYoutube(): ?string
    {
        return $this->youtube;
    }

    public function setYoutube(?string $youtube): self
    {
        $this->youtube = $youtube;

        return $this;
    }

    public function getContactoDireccion(): ?string
    {
        return $this->contactoDireccion;
    }

    public function setContactoDireccion(?string $contactoDireccion): self
    {
        $this->contactoDireccion = $contactoDireccion;

        return $this;
    }

    public function getContactoTelefono(): ?string
    {
        return $this->contactoTelefono;
    }

    public function setContactoTelefono(?string $contactoTelefono): self
    {
        $this->contactoTelefono = $contactoTelefono;

        return $this;
    }

    public function getContactoWhatsapp(): ?string
    {
        return $this->contactoWhatsapp;
    }

    public function setContactoWhatsapp(?string $contactoWhatsapp): self
    {
        $this->contactoWhatsapp = $contactoWhatsapp;

        return $this;
    }

    public function getTituloConsejos(): ?string
    {
        return $this->tituloConsejos;
    }

    public function setTituloConsejos(?string $tituloConsejos): self
    {
        $this->tituloConsejos = $tituloConsejos;

        return $this;
    }
}
