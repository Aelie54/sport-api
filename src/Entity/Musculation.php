<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\MusculationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MusculationRepository::class)]
#[ApiResource(normalizationContext: ['groups' => ['read_musculation']], denormalizationContext: ['groups' => ['write_musculation']])]
class Musculation extends Exercise
{

    #[ORM\Column(type: 'float', nullable: true)]
    #[Groups(['read_musculation' ])]
    private $poids; //kg

    #[ORM\Column(type: 'integer')]
    #[Groups(['read_musculation', 'write_musculation' ])]
    private $nombre;

    #[ORM\ManyToOne(targetEntity: TitresMuscu::class, inversedBy: 'musculations')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['read_musculation', 'write_musculation' ])]
    private $name;

    // #[ORM\ManyToOne(targetEntity: Exercise::class, inversedBy: 'musculations')]
    // private $exercise; //nombre de levées

    public function getPoids(): ?float
    {
        return $this->poids;
    }

    public function setPoids(?float $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    public function getNombre(): ?int
    {
        return $this->nombre;
    }

    public function setNombre(int $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getName(): ?TitresMuscu
    {
        return $this->name;
    }

    public function setName(?TitresMuscu $name): self
    {
        $this->name = $name;

        return $this;
    }

    // public function getExercise(): ?Exercise
    // {
    //     return $this->exercise;
    // }

    // public function setExercise(?Exercise $exercise): self
    // {
    //     $this->exercise = $exercise;

    //     return $this;
    // }
}
