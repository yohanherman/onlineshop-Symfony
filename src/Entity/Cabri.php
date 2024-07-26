<?php

namespace App\Entity;

use App\Repository\CabriRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CabriRepository::class)]
class Cabri
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cabriname = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCabriname(): ?string
    {
        return $this->cabriname;
    }

    public function setCabriname(?string $cabriname): static
    {
        $this->cabriname = $cabriname;

        return $this;
    }
}
