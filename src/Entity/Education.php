<?php

namespace App\Entity;

use App\Repository\EducationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EducationRepository::class)]
class Education
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 128)]
    private $nom_diplome;

    #[ORM\Column(type: 'string', length: 128)]
    private $Ecole;

    #[ORM\Column(type: 'dateinterval')]
    private $Annee_obtention;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomDiplome(): ?string
    {
        return $this->nom_diplome;
    }

    public function setNomDiplome(string $nom_diplome): self
    {
        $this->nom_diplome = $nom_diplome;

        return $this;
    }

    public function getEcole(): ?string
    {
        return $this->Ecole;
    }

    public function setEcole(string $Ecole): self
    {
        $this->Ecole = $Ecole;

        return $this;
    }

    public function getAnneeObtention(): ?\DateInterval
    {
        return $this->Annee_obtention;
    }

    public function setAnneeObtention(\DateInterval $Annee_obtention): self
    {
        $this->Annee_obtention = $Annee_obtention;

        return $this;
    }
}
