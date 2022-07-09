<?php

namespace App\Entity;

use App\Repository\OffreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OffreRepository::class)]
class Offre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 200)]
    private $nom_offre;

    #[ORM\Column(type: 'string', length: 200)]
    private $type_offre;

    #[ORM\Column(type: 'string', length: 200)]
    private $info_supp;


    #[ORM\Column(type: 'string', length: 200, nullable: true)]
    private $lien_offre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomOffre(): ?string
    {
        return $this->nom_offre;
    }

    public function setNomOffre(string $nom_offre): self
    {
        $this->nom_offre = $nom_offre;

        return $this;
    }

    public function getTypeOffre(): ?string
    {
        return $this->type_offre;
    }

    public function setTypeOffre(string $type_offre): self
    {
        $this->type_offre = $type_offre;

        return $this;
    }

    public function getInfoSupp(): ?string
    {
        return $this->info_supp;
    }

    public function setInfoSupp(string $info_supp): self
    {
        $this->info_supp = $info_supp;

        return $this;
    }


    public function getLienOffre(): ?string
    {
        return $this->lien_offre;
    }

    public function setLienOffre(?string $lien_offre): self
    {
        $this->lien_offre = $lien_offre;

        return $this;
    }
}
