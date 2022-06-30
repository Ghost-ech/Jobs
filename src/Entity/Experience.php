<?php

namespace App\Entity;

use App\Repository\ExperienceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExperienceRepository::class)]
class Experience
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 128)]
    private $nom_experience;

    #[ORM\Column(type: 'string', length: 128)]
    private $Poste;

    #[ORM\Column(type: 'dateinterval')]
    private $Année;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomExperience(): ?string
    {
        return $this->nom_experience;
    }

    public function setNomExperience(string $nom_experience): self
    {
        $this->nom_experience = $nom_experience;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->Poste;
    }

    public function setPoste(string $Poste): self
    {
        $this->Poste = $Poste;

        return $this;
    }

    public function getAnnée(): ?\DateInterval
    {
        return $this->Année;
    }

    public function setAnnée(\DateInterval $Année): self
    {
        $this->Année = $Année;

        return $this;
    }
}
