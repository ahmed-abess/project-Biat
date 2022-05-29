<?php

namespace App\Entity;

use App\Repository\CompteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompteRepository::class)
 */
class Compte
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adreess;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $gouvernorat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tel;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $datenaissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $etat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $situation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $payNaissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nationnalité;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $secondNationnalite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photoCin;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $cin;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $rib;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAdreess(): ?string
    {
        return $this->adreess;
    }

    public function setAdreess(?string $adreess): self
    {
        $this->adreess = $adreess;

        return $this;
    }

    public function getGouvernorat(): ?string
    {
        return $this->gouvernorat;
    }

    public function setGouvernorat(?string $gouvernorat): self
    {
        $this->gouvernorat = $gouvernorat;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(?string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getDatenaissance(): ?\DateTimeInterface
    {
        return $this->datenaissance;
    }

    public function setDatenaissance(?\DateTimeInterface $datenaissance): self
    {
        $this->datenaissance = $datenaissance;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(?string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getSituation(): ?string
    {
        return $this->situation;
    }

    public function setSituation(?string $situation): self
    {
        $this->situation = $situation;

        return $this;
    }

    public function getPayNaissance(): ?string
    {
        return $this->payNaissance;
    }

    public function setPayNaissance(?string $payNaissance): self
    {
        $this->payNaissance = $payNaissance;

        return $this;
    }

    public function getNationnalité(): ?string
    {
        return $this->nationnalité;
    }

    public function setNationnalité(?string $nationnalité): self
    {
        $this->nationnalité = $nationnalité;

        return $this;
    }

    public function getSecondNationnalite(): ?string
    {
        return $this->secondNationnalite;
    }

    public function setSecondNationnalite(?string $secondNationnalite): self
    {
        $this->secondNationnalite = $secondNationnalite;

        return $this;
    }

    public function getPhotoCin(): ?string
    {
        return $this->photoCin;
    }

    public function setPhotoCin(?string $photoCin): self
    {
        $this->photoCin = $photoCin;

        return $this;
    }

    public function getCin(): ?int
    {
        return $this->cin;
    }

    public function setCin(?int $cin): self
    {
        $this->cin = $cin;

        return $this;
    }

    public function getRib(): ?int
    {
        return $this->rib;
    }

    public function setRib(?int $rib): self
    {
        $this->rib = $rib;

        return $this;
    }
}
