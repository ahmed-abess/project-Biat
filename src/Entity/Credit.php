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
}
