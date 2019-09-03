<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Bon
 *
 * @ORM\Table(name="Bon")
 * @ORM\Entity
 */
class Bon
{
    /**
     * @var int
     *
     * @ORM\Column(name="idBon", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idbon;

    /**
     * @var int
     *
     * @ORM\Column(name="Valeur", type="integer", nullable=false)
     */
    private $valeur;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Image", type="blob", length=65535, nullable=true)
     */
    private $image;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateValidite", type="datetime", nullable=false)
     */
    private $datevalidite;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Business", mappedBy="idbon")
     */
    private $idbusiness;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idbusiness = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdbon(): ?int
    {
        return $this->idbon;
    }

    public function getValeur(): ?int
    {
        return $this->valeur;
    }

    public function setValeur(int $valeur): self
    {
        $this->valeur = $valeur;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getDatevalidite(): ?\DateTimeInterface
    {
        return $this->datevalidite;
    }

    public function setDatevalidite(\DateTimeInterface $datevalidite): self
    {
        $this->datevalidite = $datevalidite;

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
            $idbusiness->addIdbon($this);
        }

        return $this;
    }

    public function removeIdbusiness(Business $idbusiness): self
    {
        if ($this->idbusiness->contains($idbusiness)) {
            $this->idbusiness->removeElement($idbusiness);
            $idbusiness->removeIdbon($this);
        }

        return $this;
    }

}
