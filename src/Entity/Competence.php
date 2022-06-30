<?php

namespace App\Entity;

use App\Repository\CompetenceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompetenceRepository::class)]
class Competence
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 128)]
    private $nom_competence;

    #[ORM\Column(type: 'integer')]
    private $niveau_de_maitrise;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCompetence(): ?string
    {
        return $this->nom_competence;
    }

    public function setNomCompetence(string $nom_competence): self
    {
        $this->nom_competence = $nom_competence;

        return $this;
    }

    public function getNiveauDeMaitrise(): ?int
    {
        return $this->niveau_de_maitrise;
    }

    public function setNiveauDeMaitrise(int $niveau_de_maitrise): self
    {
        $this->niveau_de_maitrise = $niveau_de_maitrise;

        return $this;
    }
}
