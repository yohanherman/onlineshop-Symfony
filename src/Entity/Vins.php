<?php

namespace App\Entity;

use App\Repository\VinsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VinsRepository::class)]
class Vins
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $pathProduct = null;

    #[ORM\Column(length: 255)]
    private ?string $productName = null;

    #[ORM\Column(length: 255)]
    private ?string $productNote = null;

    #[ORM\Column(length: 255)]
    private ?string $productArea = null;

    #[ORM\Column]
    private ?float $productPrice = null;

    #[ORM\Column(length: 255)]
    private ?string $flagPath = null;

    #[ORM\Column(length: 255)]
    private ?string $cepage = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $producttageagreement = null;

    #[ORM\Column(length: 255)]
    private ?string $producttagtaste = null;

    #[ORM\Column]
    private ?int $status = null;

    #[ORM\Column(nullable: true)]
    private ?int $discountPrice = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPathProduct(): ?string
    {
        return $this->pathProduct;
    }

    public function setPathProduct(string $pathProduct): static
    {
        $this->pathProduct = $pathProduct;

        return $this;
    }

    public function getProductName(): ?string
    {
        return $this->productName;
    }

    public function setProductName(string $productName): static
    {
        $this->productName = $productName;

        return $this;
    }

    public function getProductNote(): ?string
    {
        return $this->productNote;
    }

    public function setProductNote(string $productNote): static
    {
        $this->productNote = $productNote;

        return $this;
    }

    public function getProductArea(): ?string
    {
        return $this->productArea;
    }

    public function setProductArea(string $productArea): static
    {
        $this->productArea = $productArea;

        return $this;
    }

    public function getProductPrice(): ?float
    {
        return $this->productPrice;
    }

    public function setProductPrice(float $productPrice): static
    {
        $this->productPrice = $productPrice;

        return $this;
    }

    public function getFlagPath(): ?string
    {
        return $this->flagPath;
    }

    public function setFlagPath(string $flagPath): static
    {
        $this->flagPath = $flagPath;

        return $this;
    }

    public function getCepage(): ?string
    {
        return $this->cepage;
    }

    public function setCepage(string $cepage): static
    {
        $this->cepage = $cepage;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getProducttageagreement(): ?string
    {
        return $this->producttageagreement;
    }

    public function setProducttageagreement(string $producttageagreement): static
    {
        $this->producttageagreement = $producttageagreement;

        return $this;
    }

    public function getProducttagtaste(): ?string
    {
        return $this->producttagtaste;
    }

    public function setProducttagtaste(string $producttagtaste): static
    {
        $this->producttagtaste = $producttagtaste;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getDiscountPrice(): ?int
    {
        return $this->discountPrice;
    }

    public function setDiscountPrice(?int $discountPrice): static
    {
        $this->discountPrice = $discountPrice;

        return $this;
    }
}
