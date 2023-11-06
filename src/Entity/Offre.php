<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\OffreRepository;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: OffreRepository::class)]
#[ORM\Table(name: "offre")]
class Offre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private $id;

    #[ORM\Column(type: "string", length: 100, name: "Nom_du_soin", nullable: false)]
    #[Assert\NotBlank(message: 'veuillez remplir tous les champs obligatoires')]
    private $nomDuSoin;

    #[ORM\Column(type: "string", length: 100, name: "categorie", nullable: false)]
    #[Assert\NotBlank(message: 'veuillez remplir tous les champs obligatoires')]
    #[Assert\Choice(choices: ["soin_1", "soin_2", "soin_3"], message: 'La catégorie doit être l\'une des valeurs suivantes: soin_1, soin_2, soin_3.')]
    private $categorie;

    #[ORM\Column(type: "float", precision: 10, scale: 0, name: "prix", nullable: false)]
    #[Assert\NotBlank(message: 'veuillez remplir tous les champs obligatoires')]
    private $prix;

    #[ORM\Column(type: "datetime")]
    #[Assert\NotBlank(message: 'veuillez remplir tous les champs obligatoires')]
    #[Assert\LessThan(propertyPath: "dateFin", message: "La date de début doit être inférieure à la date de fin.")]
    private ?\DateTimeInterface $dateDebut;


    #[ORM\Column(type: "datetime")]
    #[Assert\NotBlank(message: 'veuillez remplir tous les champs obligatoires')]
    private ?\DateTimeInterface $dateFin;

    #[ORM\Column(type: "string", length: 255, name: "image", nullable: false)]
    private $image;

    #[ORM\ManyToOne(targetEntity: Convention::class)]
    #[ORM\JoinColumn(name: 'convention_id', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private $convention;

    // Getter and Setter for id
    public function getId(): ?int
    {
        return $this->id;
    }

    // Note that there is no setter for id since it is auto-generated.

    // Getter and Setter for nomDuSoin
    public function getNomDuSoin(): ?string
    {
        return $this->nomDuSoin;
    }

    public function setNomDuSoin(string $nomDuSoin): self
    {
        $this->nomDuSoin = $nomDuSoin;

        return $this;
    }

    // Getter and Setter for categorie
    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    // Getter and Setter for prix
    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;
        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;
        return $this;
    }

    // Getter and Setter for image
    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    // Getter and Setter for convention
    public function getConvention(): ?Convention
    {
        return $this->convention;
    }

    public function setConvention(?Convention $convention): self
    {
        $this->convention = $convention;

        return $this;
    }
}
