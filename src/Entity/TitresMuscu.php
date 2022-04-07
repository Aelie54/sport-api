<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

use App\Repository\TitresMuscuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TitresMuscuRepository::class)]
#[ApiResource(normalizationContext: ['groups' => ['read_titresmuscu']], denormalizationContext: ['groups' => ['write_titresmuscu']])]
class TitresMuscu
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['read_titresmuscu', 'write_titresmuscu' ])]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    #[Groups(['read_titresmuscu', 'write_titresmuscu' ])]
    private $name;

    #[ORM\OneToMany(mappedBy: 'name', targetEntity: Musculation::class, orphanRemoval: true)] //ManyToOne
    #[Groups(['read_titresmuscu', 'write_titresmuscu' ])]
    private $musculations;

    public function __construct()
    {
        $this->musculations = new ArrayCollection();
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
     * @return Collection<int, Musculation>
     */
    public function getMusculations(): Collection
    {
        return $this->musculations;
    }

    public function addMusculation(Musculation $musculation): self
    {
        if (!$this->musculations->contains($musculation)) {
            $this->musculations[] = $musculation;
            $musculation->setName($this);
        }

        return $this;
    }

    public function removeMusculation(Musculation $musculation): self
    {
        if ($this->musculations->removeElement($musculation)) {
            // set the owning side to null (unless already changed)
            if ($musculation->getName() === $this) {
                $musculation->setName(null);
            }
        }

        return $this;
    }
}
