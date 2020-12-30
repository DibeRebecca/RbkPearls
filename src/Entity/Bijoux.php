<?php

namespace App\Entity;
use Symfony\Component\HttpFoundation\File;
use Symfonyy\Component\HttpFoundation\File\UploadedFile;
use App\Repository\BijouxRepository;
use App\Form\BijouxType;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * @ORM\Entity(repositoryClass=BijouxRepository::class)
 * @Vich\Uploadable()
 * @UniqueEntity("libelle")
 */
class Bijoux
{
    CONST ETAT=[
        0=>'en stock',
        1=>'vendu'
    ];
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $categorie;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commande", mappedBy="bijoux")
     */
    private $commandes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity=Categorie::class, mappedBy="titre")
     */
    private $categories;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    public function getImage()
   {
       return $this->image;
   }

   public function setImage($image)
   {
       $this->image = $image;

       return $this;
   }

   public function getFileName()
   {
       return $this->filename;
   }

   public function setFileName($filename)
   {
       $this->filename = $filename;

       return $this;
   }

   public function getImageFile()
   {
       return $this->imagefile;
   }

   public function setImageFile($imagefile)
   {
       $this->imagefile = $imagefile;

       return $this;
   }

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
        $this->categories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection|Categorie[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

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

}
