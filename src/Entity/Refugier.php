<?php

namespace App\Entity;

use App\Repository\RefugierRepository;
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

    #[ORM\OneToOne(mappedBy: 'Refugier', targetEntity: User::class, cascade: ['persist', 'remove'])]
    private $user;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        // set the owning side of the relation if necessary
        if ($user->getRefugier() !== $this) {
            $user->setRefugier($this);
        }

        $this->user = $user;

        return $this;
    }
}
