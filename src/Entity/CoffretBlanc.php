<?php

namespace App\Entity;

use App\Repository\CoffretBlancRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoffretBlancRepository::class)]
class CoffretBlanc
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $path_product = null;

    #[ORM\Column(length: 255)]
    private ?string $product_name = null;

    #[ORM\Column(length: 255)]
    private ?string $product_note = null;

    #[ORM\Column(length: 255)]
    private ?string $product_area = null;

    #[ORM\Column]
    private ?float $product_price = null;

    #[ORM\Column(length: 255)]
    private ?string $flag_path = null;

    #[ORM\Column(length: 255)]
    private ?string $cepage = null;

    #[ORM\Column(length: 255)]
    private ?string $productagreement = null;

    #[ORM\Column(length: 255)]
    private ?string $producttaste = null;

    #[ORM\Column]
    private ?int $status = null;

    #[ORM\Column]
    private ?int $discount_price = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPathProduct(): ?string
    {
        return $this->path_product;
    }

    public function setPathProduct(string $path_product): static
    {
        $this->path_product = $path_product;

        return $this;
    }

    public function getProductName(): ?string
    {
        return $this->product_name;
    }

    public function setProductName(string $product_name): static
    {
        $this->product_name = $product_name;

        return $this;
    }

    public function getProductNote(): ?string
    {
        return $this->product_note;
    }

    public function setProductNote(string $product_note): static
    {
        $this->product_note = $product_note;

        return $this;
    }

    public function getProductArea(): ?string
    {
        return $this->product_area;
    }

    public function setProductArea(string $product_area): static
    {
        $this->product_area = $product_area;

        return $this;
    }

    public function getProductPrice(): ?float
    {
        return $this->product_price;
    }

    public function setProductPrice(float $product_price): static
    {
        $this->product_price = $product_price;

        return $this;
    }

    public function getFlagPath(): ?string
    {
        return $this->flag_path;
    }

    public function setFlagPath(string $flag_path): static
    {
        $this->flag_path = $flag_path;

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

    public function getProductagreement(): ?string
    {
        return $this->productagreement;
    }

    public function setProductagreement(string $productagreement): static
    {
        $this->productagreement = $productagreement;

        return $this;
    }

    public function getProducttaste(): ?string
    {
        return $this->producttaste;
    }

    public function setProducttaste(string $producttaste): static
    {
        $this->producttaste = $producttaste;

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
        return $this->discount_price;
    }

    public function setDiscountPrice(int $discount_price): static
    {
        $this->discount_price = $discount_price;

        return $this;
    }
}
