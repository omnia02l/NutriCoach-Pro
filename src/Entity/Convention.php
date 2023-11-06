<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ConventionRepository;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: ConventionRepository::class)]
#[ORM\Table(name: "convention")]
class Convention
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private $id;

    #[ORM\Column(type: "string", length: 40, name: "societe", nullable: false)]
    #[Assert\NotBlank(message: 'veuillez remplir tous les champs obligatoires')]
    #[Assert\Length(min: 4, minMessage: 'Le nom de societe doit comporter au moins {{ limit }} caractères')]
    private $societe;

    #[ORM\Column(type: "string", length: 40, name: "adresse", nullable: false)]
    #[Assert\NotBlank(message: 'veuillez remplir tous les champs obligatoires')]
    #[Assert\Length(min: 4, minMessage: 'L\'adresse doit comporter au moins {{ limit }} caractères')]
    private $adresse;

    #[ORM\Column(type: "string", length: 40, name: "email", nullable: false)]
    #[Assert\NotBlank(message: 'veuillez remplir tous les champs obligatoires')]
    #[Assert\Email(message: 'L\'adresse email "{{ value }}" n\'est pas valide.')]
    private $email;

    #[ORM\Column(type: "string", length: 9, name: "telephone", nullable: false)]
    #[Assert\NotBlank(message: 'veuillez remplir tous les champs obligatoires')]
    #[Assert\Length(min: 8, minMessage: 'Le numero doit comporter au moins {{ limit }} chiffres')]
    private $telephone;

    #[ORM\Column(type: "string", length: 20, name: "status", nullable: true)]
    #[Assert\Choice(choices: ["convention déposée", "convention acceptée", "convention refusé"], message: 'La status doit être l\'une des valeurs suivantes: soin_1, soin_2, soin_3.')]
    private $status= "convention déposée";

    // Getter and Setter for id
    public function getId(): ?int
    {
        return $this->id;
    }

    // Note that there is no setter for id since it is auto-generated.

    // Getter and Setter for societe
    public function getSociete(): ?string
    {
        return $this->societe;
    }

    public function setSociete(string $societe): self
    {
        $this->societe = $societe;

        return $this;
    }

    // Getter and Setter for adresse
    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    // Getter and Setter for email
    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    // Getter and Setter for telephone
    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    // Getter and Setter for status
    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }
}
