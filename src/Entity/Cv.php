<?php

namespace App\Entity;

use App\Repository\CvRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CvRepository::class)]
class Cv
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;


    #[ORM\OneToMany(mappedBy: 'Cv', targetEntity: Langue::class)]
    private $langues;

    #[ORM\ManyToOne(targetEntity: Langue::class, inversedBy: 'cvs')]
    #[ORM\JoinColumn(nullable: false)]
    private $Langue;

    #[ORM\ManyToOne(targetEntity: Competence::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $Competence;

    #[ORM\ManyToOne(targetEntity: Education::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $Education;

    #[ORM\ManyToOne(targetEntity: Experience::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $Experience;

    #[ORM\ManyToOne(targetEntity: InformationPersonnel::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $InfoPersonnel;

    #[ORM\OneToMany(mappedBy: 'Cv', targetEntity: Refugier::class)]
    private $refugiers;

    public function __construct()
    {
        $this->langues = new ArrayCollection();
        $this->refugiers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    /**
     * @return Collection<int, Langue>
     */
    public function getLangues(): Collection
    {
        return $this->langues;
    }

    

    public function getLangue(): ?Langue
    {
        return $this->Langue;
    }

    public function setLangue(?Langue $Langue): self
    {
        $this->Langue = $Langue;

        return $this;
    }

    public function getCompetence(): ?Competence
    {
        return $this->Competence;
    }

    public function setCompetence(?Competence $Competence): self
    {
        $this->Competence = $Competence;

        return $this;
    }

    public function getEducation(): ?Education
    {
        return $this->Education;
    }

    public function setEducation(?Education $Education): self
    {
        $this->Education = $Education;

        return $this;
    }

    public function getExperience(): ?Experience
    {
        return $this->Experience;
    }

    public function setExperience(?Experience $Experience): self
    {
        $this->Experience = $Experience;

        return $this;
    }

    public function getInfoPersonnel(): ?InformationPersonnel
    {
        return $this->InfoPersonnel;
    }

    public function setInfoPersonnel(?InformationPersonnel $InfoPersonnel): self
    {
        $this->InfoPersonnel = $InfoPersonnel;

        return $this;
    }

    /**
     * @return Collection<int, Refugier>
     */
    public function getRefugiers(): Collection
    {
        return $this->refugiers;
    }

    public function addRefugier(Refugier $refugier): self
    {
        if (!$this->refugiers->contains($refugier)) {
            $this->refugiers[] = $refugier;
            $refugier->setCv($this);
        }

        return $this;
    }

    public function removeRefugier(Refugier $refugier): self
    {
        if ($this->refugiers->removeElement($refugier)) {
            // set the owning side to null (unless already changed)
            if ($refugier->getCv() === $this) {
                $refugier->setCv(null);
            }
        }

        return $this;
    }
}
