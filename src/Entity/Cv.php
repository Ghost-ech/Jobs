<?php

namespace App\Entity;

use App\Repository\CvRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CvRepository::class)]
class Cv
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Refugier::class, inversedBy: 'cvs')]
    #[ORM\JoinColumn(nullable: false)]
    private $Refugier;
  
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRefugier(): ?Refugier
    {
        return $this->Refugier;
    }

    public function setRefugier(?Refugier $Refugier): self
    {
        $this->Refugier = $Refugier;

        return $this;
    }
}
