<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Events
 *
 * @ORM\Table(name="Events")
 * @ORM\Entity
 */
class Events
{
    /**
     * @var int
     *
     * @ORM\Column(name="idEvents", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idevents;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Debut", type="datetime", nullable=false)
     */
    private $debut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Fin", type="datetime", nullable=false)
     */
    private $fin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Image", type="blob", length=65535, nullable=true)
     */
    private $image;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Business", mappedBy="idevents")
     */
    private $idbusiness;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idbusiness = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdevents(): ?int
    {
        return $this->idevents;
    }

    public function getDebut(): ?\DateTimeInterface
    {
        return $this->debut;
    }

    public function setDebut(\DateTimeInterface $debut): self
    {
        $this->debut = $debut;

        return $this;
    }

    public function getFin(): ?\DateTimeInterface
    {
        return $this->fin;
    }

    public function setFin(\DateTimeInterface $fin): self
    {
        $this->fin = $fin;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection|Business[]
     */
    public function getIdbusiness(): Collection
    {
        return $this->idbusiness;
    }

    public function addIdbusiness(Business $idbusiness): self
    {
        if (!$this->idbusiness->contains($idbusiness)) {
            $this->idbusiness[] = $idbusiness;
            $idbusiness->addIdevent($this);
        }

        return $this;
    }

    public function removeIdbusiness(Business $idbusiness): self
    {
        if ($this->idbusiness->contains($idbusiness)) {
            $this->idbusiness->removeElement($idbusiness);
            $idbusiness->removeIdevent($this);
        }

        return $this;
    }

}
