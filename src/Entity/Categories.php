<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoriesRepository::class)]
class Categories
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, vins>
     */
    #[ORM\OneToMany(targetEntity: vins::class, mappedBy: 'categories')]
    private Collection $vins;

    public function __construct()
    {
        $this->vins = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, vins>
     */
    public function getVins(): Collection
    {
        return $this->vins;
    }

    public function addVin(vins $vin): static
    {
        if (!$this->vins->contains($vin)) {
            $this->vins->add($vin);
            $vin->setCategories($this);
        }

        return $this;
    }

    public function removeVin(vins $vin): static
    {
        if ($this->vins->removeElement($vin)) {
            // set the owning side to null (unless already changed)
            if ($vin->getCategories() === $this) {
                $vin->setCategories(null);
            }
        }

        return $this;
    }
}
