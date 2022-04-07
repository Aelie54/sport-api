<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

use App\Repository\TitresFitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TitresFitRepository::class)]
#[ApiResource(normalizationContext: ['groups' => ['read_titresfit']], denormalizationContext: ['groups' => ['write_titresfit']])]
class TitresFit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['read_titresfit', 'write_titresfit' ])]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    #[Groups(['read_titresfit', 'write_titresfit' ])]
    private $name;

    #[ORM\OneToMany(mappedBy: 'name', targetEntity: Fitness::class, orphanRemoval: true)]
    #[Groups(['read_titresfit', 'write_titresfit' ])]
    private $fitnesses;

    public function __construct()
    {
        $this->fitnesses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Fitness>
     */
    public function getFitnesses(): Collection
    {
        return $this->fitnesses;
    }

    public function addFitness(Fitness $fitness): self
    {
        if (!$this->fitnesses->contains($fitness)) {
            $this->fitnesses[] = $fitness;
            $fitness->setName($this);
        }

        return $this;
    }

    public function removeFitness(Fitness $fitness): self
    {
        if ($this->fitnesses->removeElement($fitness)) {
            // set the owning side to null (unless already changed)
            if ($fitness->getName() === $this) {
                $fitness->setName(null);
            }
        }

        return $this;
    }
}
