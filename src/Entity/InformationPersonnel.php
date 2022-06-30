<?php

namespace App\Entity;

use App\Repository\InformationPersonnelRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InformationPersonnelRepository::class)]
class InformationPersonnel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 128)]
    private $nom;

    #[ORM\Column(type: 'string', length: 128)]
    private $Statut_matrimonial;

    #[ORM\Column(type: 'date')]
    private $date_de_naissance;

    #[ORM\Column(type: 'string', length: 128)]
    private $lieu_de_naissance;

    #[ORM\Column(type: 'integer')]
    private $numero_telephone;

    #[ORM\Column(type: 'string', length: 128)]
    private $Quartier;

    #[ORM\Column(type: 'string', length: 128)]
    private $Ville;

    #[ORM\Column(type: 'string', length: 128)]
    private $nationalite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getStatutMatrimonial(): ?string
    {
        return $this->Statut_matrimonial;
    }

    public function setStatutMatrimonial(string $Statut_matrimonial): self
    {
        $this->Statut_matrimonial = $Statut_matrimonial;

        return $this;
    }

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->date_de_naissance;
    }

    public function setDateDeNaissance(\DateTimeInterface $date_de_naissance): self
    {
        $this->date_de_naissance = $date_de_naissance;

        return $this;
    }

    public function getLieuDeNaissance(): ?string
    {
        return $this->lieu_de_naissance;
    }

    public function setLieuDeNaissance(string $lieu_de_naissance): self
    {
        $this->lieu_de_naissance = $lieu_de_naissance;

        return $this;
    }

    public function getNumeroTelephone(): ?int
    {
        return $this->numero_telephone;
    }

    public function setNumeroTelephone(int $numero_telephone): self
    {
        $this->numero_telephone = $numero_telephone;

        return $this;
    }

    public function getQuartier(): ?string
    {
        return $this->Quartier;
    }

    public function setQuartier(string $Quartier): self
    {
        $this->Quartier = $Quartier;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->Ville;
    }

    public function setVille(string $Ville): self
    {
        $this->Ville = $Ville;

        return $this;
    }

    public function getNationalite(): ?string
    {
        return $this->nationalite;
    }

    public function setNationalite(string $nationalite): self
    {
        $this->nationalite = $nationalite;

        return $this;
    }
}
