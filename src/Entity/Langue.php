<?php

namespace App\Entity;

use App\Repository\LangueRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LangueRepository::class)]
class Langue
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 128)]
    private $nom_langue;

    #[ORM\Column(type: 'integer')]
    private $niveau_maitrise;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomLangue(): ?string
    {
        return $this->nom_langue;
    }

    public function setNomLangue(string $nom_langue): self
    {
        $this->nom_langue = $nom_langue;

        return $this;
    }

    public function getNiveauMaitrise(): ?int
    {
        return $this->niveau_maitrise;
    }

    public function setNiveauMaitrise(int $niveau_maitrise): self
    {
        $this->niveau_maitrise = $niveau_maitrise;

        return $this;
    }
}
