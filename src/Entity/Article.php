<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 200)]
    private ?string $title = null;

    #[ORM\Column(length: 7000)]
    private ?string $text = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $datePublication = null;

    #[ORM\ManyToOne(inversedBy: 'articles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ArticleCategory $categoryId = null;

    #[ORM\ManyToOne]
    private ?Image $firstImageId = null;

    #[ORM\ManyToOne]
    private ?Image $secondImageId = null;

    #[ORM\ManyToOne]
    private ?Image $thirdImageId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): static
    {
        $this->text = $text;

        return $this;
    }

    public function getDatePublication(): ?\DateTimeInterface
    {
        return $this->datePublication;
    }

    public function setDatePublication(\DateTimeInterface $datePublication): static
    {
        $this->datePublication = $datePublication;

        return $this;
    }

    public function getCategoryId(): ?ArticleCategory
    {
        return $this->categoryId;
    }

    public function setCategoryId(?ArticleCategory $categoryId): static
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    public function getFirstImageId(): ?Image
    {
        return $this->firstImageId;
    }

    public function setFirstImageId(?Image $firstImageId): static
    {
        $this->firstImageId = $firstImageId;

        return $this;
    }

    public function getSecondImageId(): ?Image
    {
        return $this->secondImageId;
    }

    public function setSecondImageId(?Image $secondImageId): static
    {
        $this->secondImageId = $secondImageId;

        return $this;
    }

    public function getThirdImageId(): ?Image
    {
        return $this->thirdImageId;
    }

    public function setThirdImageId(?Image $thirdImageId): static
    {
        $this->thirdImageId = $thirdImageId;

        return $this;
    }
}
