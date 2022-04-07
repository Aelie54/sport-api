<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

use App\Repository\TrainingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TrainingRepository::class)]
#[ApiResource(normalizationContext: ['groups' => ['read_training']], denormalizationContext: ['groups' => ['write_training']])]
class Training
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['read_training' ])]
    private $id;

    #[ORM\Column(type: 'date')]
    #[Groups(['read_training', 'write_training' ])]
    private $date;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'trainings')]
    #[Groups(['read_training', 'write_training' ])]
    private $person;

    #[ORM\ManyToOne(targetEntity: Exercise::class, inversedBy: 'trainings')]
    #[Groups(['read_training', 'write_training' ])]
    private $exercise;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getPerson(): ?User
    {
        return $this->person;
    }

    public function setPerson(?User $person): self
    {
        $this->person = $person;

        return $this;
    }

    public function getExercise(): ?Exercise
    {
        return $this->exercise;
    }

    public function setExercise(?Exercise $exercise): self
    {
        $this->exercise = $exercise;

        return $this;
    }

}
