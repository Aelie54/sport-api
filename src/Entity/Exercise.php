<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

use App\Repository\ExerciseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExerciseRepository::class)]
#[ORM\InheritanceType("JOINED")]
#[ORM\DiscriminatorColumn('TypeOfExercise', "string")]
#[ORM\DiscriminatorMap(['gainage' => "Gainage", 'musculation' => "Musculation", 'fitness'=> "Fitness"])]
#[ORM\MappedSuperclass]
#[ApiResource(normalizationContext: ['groups' => ['read_exercise']], denormalizationContext: ['groups' => ['write_exercise']])]
abstract class Exercise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['read_exercise', 'write_exercise' ])]
    protected $id;

    #[ORM\OneToMany(mappedBy: 'exercises', targetEntity: Training::class)]
    #[Groups(['read_exercise', 'write_exercise' ])]
    private $trainings;

    public function __construct()
    {
        $this->trainings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __tostring(){
        return $this->id ;
    }


    /**
     * @return Collection<int, Training>
     */
    public function getTrainings(): Collection
    {
        return $this->trainings;
    }

    public function addTraining(Training $training): self
    {
        if (!$this->trainings->contains($training)) {
            $this->trainings[] = $training;
            $training->setExercises($this);
        }

        return $this;
    }

    public function removeTraining(Training $training): self
    {
        if ($this->trainings->removeElement($training)) {
            // set the owning side to null (unless already changed)
            if ($training->getExercises() === $this) {
                $training->setExercises(null);
            }
        }

        return $this;
    }

}
