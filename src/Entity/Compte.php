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
    private $nationnalit√©;

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
     * @ORM\Column(type="float", nullable=true)
     */
    private $rib;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $revenueNet;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $typeC;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $chiffreaffaire;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateCreationEntreprise;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbrSalarie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $paysAcivite;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     */
    private $client;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $statut;

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

    public function getNationnalit√©(): ?string
    {
        return $this->nationnalit√©;
    }

    public function setNationnalit√©(?string $nationnalit√©): self
    {
        $this->nationnalit√© = $nationnalit√©;

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

    public function getRevenueNet(): ?string
    {
        return $this->revenueNet;
    }

    public function setRevenueNet(?string $revenueNet): self
    {
        $this->revenueNet = $revenueNet;

        return $this;
    }

    public function getTypeC(): ?string
    {
        return $this->typeC;
    }

    public function setTypeC(?string $typeC): self
    {
        $this->typeC = $typeC;

        return $this;
    }

    public function getChiffreaffaire(): ?string
    {
        return $this->chiffreaffaire;
    }

    public function setChiffreaffaire(?string $chiffreaffaire): self
    {
        $this->chiffreaffaire = $chiffreaffaire;

        return $this;
    }

    public function getDateCreationEntreprise(): ?\DateTimeInterface
    {
        return $this->dateCreationEntreprise;
    }

    public function setDateCreationEntreprise(?\DateTimeInterface $dateCreationEntreprise): self
    {
        $this->dateCreationEntreprise = $dateCreationEntreprise;

        return $this;
    }

    public function getNbrSalarie(): ?int
    {
        return $this->nbrSalarie;
    }

    public function setNbrSalarie(?int $nbrSalarie): self
    {
        $this->nbrSalarie = $nbrSalarie;

        return $this;
    }

    public function getPaysAcivite(): ?string
    {
        return $this->paysAcivite;
    }

    public function setPaysAcivite(?string $paysAcivite): self
    {
        $this->paysAcivite = $paysAcivite;

        return $this;
    }

    public function getClient(): ?User
    {
        return $this->client;
    }

    public function setClient(?User $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(?bool $statut): self
    {
        $this->statut = $statut;

        return $this;
    }
}
