<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Horaire
 *
 * @ORM\Table(name="Horaire")
 * @ORM\Entity
 */
class Horaire
{
    /**
     * @var int
     *
     * @ORM\Column(name="idHoraire", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idhoraire;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="HDebutM", type="time", nullable=true)
     */
    private $hdebutm;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="HFinM", type="time", nullable=true)
     */
    private $hfinm;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="HDebutA", type="time", nullable=true)
     */
    private $hdebuta;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="HFinA", type="time", nullable=true)
     */
    private $hfina;

    /**
     * @var string
     *
     * @ORM\Column(name="Jour", type="string", length=10, nullable=false)
     */
    private $jour;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Business", inversedBy="idhoraire")
     * @ORM\JoinTable(name="BusinessHours",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idHoraire", referencedColumnName="idHoraire")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="IdBusiness", referencedColumnName="idBusiness")
     *   }
     * )
     */
    private $idbusiness;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idbusiness = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdhoraire(): ?int
    {
        return $this->idhoraire;
    }

    public function getHdebutm(): ?\DateTimeInterface
    {
        return $this->hdebutm;
    }

    public function setHdebutm(?\DateTimeInterface $hdebutm): self
    {
        $this->hdebutm = $hdebutm;

        return $this;
    }

    public function getHfinm(): ?\DateTimeInterface
    {
        return $this->hfinm;
    }

    public function setHfinm(?\DateTimeInterface $hfinm): self
    {
        $this->hfinm = $hfinm;

        return $this;
    }

    public function getHdebuta(): ?\DateTimeInterface
    {
        return $this->hdebuta;
    }

    public function setHdebuta(?\DateTimeInterface $hdebuta): self
    {
        $this->hdebuta = $hdebuta;

        return $this;
    }

    public function getHfina(): ?\DateTimeInterface
    {
        return $this->hfina;
    }

    public function setHfina(?\DateTimeInterface $hfina): self
    {
        $this->hfina = $hfina;

        return $this;
    }

    public function getJour(): ?string
    {
        return $this->jour;
    }

    public function setJour(string $jour): self
    {
        $this->jour = $jour;

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
        }

        return $this;
    }

    public function removeIdbusiness(Business $idbusiness): self
    {
        if ($this->idbusiness->contains($idbusiness)) {
            $this->idbusiness->removeElement($idbusiness);
        }

        return $this;
    }

}
