<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Business
 *
 * @ORM\Table(name="Business", uniqueConstraints={@ORM\UniqueConstraint(name="idBusiness_UNIQUE", columns={"idBusiness"})})
 * @ORM\Entity
 */
class Business  implements UserInterface, \Serializable
{
    /**
     * @var int
     *
     * @ORM\Column(name="idBusiness", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idbusiness;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="Address", type="string", length=255, nullable=false)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="City", type="string", length=45, nullable=false)
     */
    private $city;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Telephone", type="string", length=13, nullable=true)
     */
    private $telephone;

    /**
     * @var int
     *
     * @ORM\Column(name="PointValue", type="integer", nullable=false)
     */
    private $pointvalue;

    /**
     * @var int
     *
     * @ORM\Column(name="VoucherValue", type="integer", nullable=false)
     */
    private $vouchervalue;

    /**
     * @var int
     *
     * @ORM\Column(name="PointsForVoucher", type="integer", nullable=false)
     */
    private $pointsforvoucher;

    /**
     * @var string
     *
     * @ORM\Column(name="Password", type="string", length=45, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=100, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var int
     *
     * @ORM\Column(name="Points_idBusiness", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $pointsIdbusiness;

    /**
     * @var int
     *
     * @ORM\Column(name="Points_idUser", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $pointsIduser;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Bon", inversedBy="idbusiness")
     * @ORM\JoinTable(name="BusinessBon",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idBusiness", referencedColumnName="idBusiness")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idBon", referencedColumnName="idBon")
     *   }
     * )
     */
    private $idbon;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Events", inversedBy="idbusiness")
     * @ORM\JoinTable(name="BusinessEvents",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idBusiness", referencedColumnName="idBusiness")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idEvents", referencedColumnName="idEvents")
     *   }
     * )
     */
    private $idevents;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Horaire", mappedBy="idbusiness")
     */
    private $idhoraire;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="User", inversedBy="idbusiness")
     * @ORM\JoinTable(name="Points",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idBusiness", referencedColumnName="idBusiness")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idUser", referencedColumnName="idUser")
     *   }
     * )
     */
    private $iduser;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idbon = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idevents = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idhoraire = new \Doctrine\Common\Collections\ArrayCollection();
        $this->iduser = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdbusiness(): ?int
    {
        return $this->idbusiness;
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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getPointvalue(): ?int
    {
        return $this->pointvalue;
    }

    public function setPointvalue(int $pointvalue): self
    {
        $this->pointvalue = $pointvalue;

        return $this;
    }

    public function getVouchervalue(): ?int
    {
        return $this->vouchervalue;
    }

    public function setVouchervalue(int $vouchervalue): self
    {
        $this->vouchervalue = $vouchervalue;

        return $this;
    }

    public function getPointsforvoucher(): ?int
    {
        return $this->pointsforvoucher;
    }

    public function setPointsforvoucher(int $pointsforvoucher): self
    {
        $this->pointsforvoucher = $pointsforvoucher;

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

    public function getPointsIdbusiness(): ?int
    {
        return $this->pointsIdbusiness;
    }

    public function getPointsIduser(): ?int
    {
        return $this->pointsIduser;
    }

    /**
     * @return Collection|Bon[]
     */
    public function getIdbon(): Collection
    {
        return $this->idbon;
    }

    public function addIdbon(Bon $idbon): self
    {
        if (!$this->idbon->contains($idbon)) {
            $this->idbon[] = $idbon;
        }

        return $this;
    }

    public function removeIdbon(Bon $idbon): self
    {
        if ($this->idbon->contains($idbon)) {
            $this->idbon->removeElement($idbon);
        }

        return $this;
    }

    /**
     * @return Collection|Events[]
     */
    public function getIdevents(): Collection
    {
        return $this->idevents;
    }

    public function addIdevent(Events $idevent): self
    {
        if (!$this->idevents->contains($idevent)) {
            $this->idevents[] = $idevent;
        }

        return $this;
    }

    public function removeIdevent(Events $idevent): self
    {
        if ($this->idevents->contains($idevent)) {
            $this->idevents->removeElement($idevent);
        }

        return $this;
    }

    /**
     * @return Collection|Horaire[]
     */
    public function getIdhoraire(): Collection
    {
        return $this->idhoraire;
    }

    public function addIdhoraire(Horaire $idhoraire): self
    {
        if (!$this->idhoraire->contains($idhoraire)) {
            $this->idhoraire[] = $idhoraire;
            $idhoraire->addIdbusiness($this);
        }

        return $this;
    }

    public function removeIdhoraire(Horaire $idhoraire): self
    {
        if ($this->idhoraire->contains($idhoraire)) {
            $this->idhoraire->removeElement($idhoraire);
            $idhoraire->removeIdbusiness($this);
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getIduser(): Collection
    {
        return $this->iduser;
    }

    public function addIduser(User $iduser): self
    {
        if (!$this->iduser->contains($iduser)) {
            $this->iduser[] = $iduser;
        }

        return $this;
    }

    public function removeIduser(User $iduser): self
    {
        if ($this->iduser->contains($iduser)) {
            $this->iduser->removeElement($iduser);
        }

        return $this;
    }

    /**
     * String representation of object
     * @link https://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     * @since 5.1.0
     */
    public function serialize()
    {
        // TODO: Implement serialize() method.
    }

    /**
     * Constructs the object
     * @link https://php.net/manual/en/serializable.unserialize.php
     * @param string $serialized <p>
     * The string representation of the object.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function unserialize($serialized)
    {
        // TODO: Implement unserialize() method.
    }

    /**
     * Returns the roles granted to the user.
     */
          public function getRoles()
          {
              return ['ROLE_USER'];
          }
     /*
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
//    public function getRoles()
//    {
//        $roles = $this->roles;
//        // guarantee every user at least has ROLE_USER
//        $roles[] = 'ROLE_USER';
//        return array_unique($roles);
//
//    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
