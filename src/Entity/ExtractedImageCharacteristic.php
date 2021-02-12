<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ExtractedImageCharacteristicRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExtractedImageCharacteristicRepository::class)
 */
class ExtractedImageCharacteristic
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity=ExtractedImage::class, inversedBy="characteristics")
     * @ORM\JoinColumn(nullable=false)
     */
    private $extractedImage;

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

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getExtractedImage(): ?ExtractedImage
    {
        return $this->extractedImage;
    }

    public function setExtractedImage(?ExtractedImage $extractedImage): self
    {
        $this->extractedImage = $extractedImage;

        return $this;
    }
}
