<?php

namespace App\Entity;

use App\Repository\CreditRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CreditRepository::class)
 */
class Credit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $montant;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbMois;

    /**
     * @ORM\Column(type="string", length=512, nullable=true)
     */
    private $ficheDep;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     */
    private $client;

    /**
     * @ORM\OneToOne(targetEntity=TypeCredit::class, cascade={"persist", "remove"})
     */
    private $typeCredit;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $statut;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(?float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getNbMois(): ?int
    {
        return $this->nbMois;
    }

    public function setNbMois(int $nbMois): self
    {
        $this->nbMois = $nbMois;

        return $this;
    }

    public function getFicheDep(): ?string
    {
        return $this->ficheDep;
    }

    public function setFicheDep(?string $ficheDep): self
    {
        $this->ficheDep = $ficheDep;

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

    public function getTypeCredit(): ?TypeCredit
    {
        return $this->typeCredit;
    }

    public function setTypeCredit(?TypeCredit $typeCredit): self
    {
        $this->typeCredit = $typeCredit;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

}
