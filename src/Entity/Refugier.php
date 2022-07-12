<?php

namespace App\Entity;

use App\Repository\RefugierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RefugierRepository::class)]
class Refugier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 200)]
    private $info_supp;

    #[ORM\OneToMany(mappedBy: 'Refugier', targetEntity: Cv::class)]
    private $cvs;


    #[ORM\ManyToOne(targetEntity: Cv::class, inversedBy: 'refugiers')]
    #[ORM\JoinColumn(nullable: false)]
    private $Cv;

    #[ORM\OneToOne(inversedBy: 'refugier', targetEntity: User::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $User;

    public function __construct()
    {
        $this->cvs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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


    /**
     * @return Collection<int, Cv>
     */
    public function getCvs(): Collection
    {
        return $this->cvs;
    }


    public function getCv(): ?Cv
    {
        return $this->Cv;
    }

    public function setCv(?Cv $Cv): self
    {
        $this->Cv = $Cv;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(User $User): self
    {
        $this->User = $User;

        return $this;
    }
}
