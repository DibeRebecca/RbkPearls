<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandeRepository")
 */
class Commande
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateCommande;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $codeCommande;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomsClient;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Bijoux", inversedBy="commandes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bijoux;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->dateCommande;
    }

    public function setDateCommande(\DateTimeInterface $dateCommande): self
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    public function getCodeCommande(): ?string
    {
        return $this->codeCommande;
    }

    public function setCodeCommande(string $codeCommande): self
    {
        $this->codeCommande = $codeCommande;

        return $this;
    }

    public function getNomsClient(): ?string
    {
        return $this->nomsClient;
    }

    public function setNomsClient(string $nomsClient): self
    {
        $this->nomsClient = $nomsClient;

        return $this;
    }

    public function getBijoux(): ?Bijoux
    {
        return $this->bijoux;
    }

    public function setBijoux(?Bijoux $bijoux): self
    {
        $this->bijoux = $bijoux;

        return $this;
    }
}
