<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="User", uniqueConstraints={@ORM\UniqueConstraint(name="QRCode_UNIQUE", columns={"QRCode"}), @ORM\UniqueConstraint(name="idUser_UNIQUE", columns={"idUser"})})
 * @ORM\Entity
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Column(name="idUser", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iduser;

    /**
     * @var string
     *
     * @ORM\Column(name="FirstName", type="string", length=100, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=45, nullable=false)
     */
    private $password;

    /**
     * @var int|null
     *
     * @ORM\Column(name="QRCode", type="integer", nullable=true)
     */
    private $qrcode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Type", type="string", length=45, nullable=true)
     */
    private $type;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LastName", type="string", length=45, nullable=true)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="Username", type="string", length=45, nullable=false)
     */
    private $username;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Business", mappedBy="iduser")
     */
    private $idbusiness;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idbusiness = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIduser(): ?int
    {
        return $this->iduser;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getQrcode(): ?int
    {
        return $this->qrcode;
    }

    public function setQrcode(?int $qrcode): self
    {
        $this->qrcode = $qrcode;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

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
            $idbusiness->addIduser($this);
        }

        return $this;
    }

    public function removeIdbusiness(Business $idbusiness): self
    {
        if ($this->idbusiness->contains($idbusiness)) {
            $this->idbusiness->removeElement($idbusiness);
            $idbusiness->removeIduser($this);
        }

        return $this;
    }

}
