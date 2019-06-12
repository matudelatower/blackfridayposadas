<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RubroRepository")
 */
class Rubro extends BaseClass
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
    private $nombre;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comercio", mappedBy="rubro")
     */
    private $comercios;

	public function __toString() {
		return $this->nombre;
	}

    public function __construct()
    {
        $this->comercios = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return Collection|Comercio[]
     */
    public function getComercios(): Collection
    {
        return $this->comercios;
    }

    public function addComercio(Comercio $comercio): self
    {
        if (!$this->comercios->contains($comercio)) {
            $this->comercios[] = $comercio;
            $comercio->setRubro($this);
        }

        return $this;
    }

    public function removeComercio(Comercio $comercio): self
    {
        if ($this->comercios->contains($comercio)) {
            $this->comercios->removeElement($comercio);
            // set the owning side to null (unless already changed)
            if ($comercio->getRubro() === $this) {
                $comercio->setRubro(null);
            }
        }

        return $this;
    }
}
