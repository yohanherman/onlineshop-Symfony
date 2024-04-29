<?php

namespace App\Entity;

use App\Repository\ReviewsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ReviewsRepository::class)]
class Reviews
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['getAllWines', 'getAllReviews'])]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['getAllWines', 'getAllReviews'])]
    private ?string $commentaires = null;

    #[ORM\ManyToOne(inversedBy: 'reviews')]
    #[Groups(['getAllReviews'])]
    private ?vins $vins = null;

    #[ORM\ManyToOne(inversedBy: 'reviews')]
    #[Groups(['getAllWines', 'getAllReviews'])]
    private ?User $user = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommentaires(): ?string
    {
        return $this->commentaires;
    }

    public function setCommentaires(?string $commentaires): static
    {
        $this->commentaires = $commentaires;

        return $this;
    }

    public function getVins(): ?vins
    {
        return $this->vins;
    }

    public function setVins(?vins $vins): static
    {
        $this->vins = $vins;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
