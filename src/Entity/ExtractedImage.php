<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ExtractedImageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExtractedImageRepository::class)
 */
class ExtractedImage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $imageUrl;

    /**
     * @ORM\OneToMany(targetEntity=ExtractedImageCharacteristic::class, mappedBy="extractedImage", orphanRemoval=true)
     */
    private $characteristics;

    public function __construct()
    {
        $this->characteristics = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(string $imageUrl): self
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * @return Collection|ExtractedImageCharacteristic[]
     */
    public function getCharacteristics(): Collection
    {
        return $this->characteristics;
    }

    public function addCharacteristic(ExtractedImageCharacteristic $characteristic): self
    {
        if (!$this->characteristics->contains($characteristic)) {
            $this->characteristics[] = $characteristic;
            $characteristic->setExtractedImage($this);
        }

        return $this;
    }

    public function removeCharacteristic(ExtractedImageCharacteristic $characteristic): self
    {
        if ($this->characteristics->removeElement($characteristic)) {
            // set the owning side to null (unless already changed)
            if ($characteristic->getExtractedImage() === $this) {
                $characteristic->setExtractedImage(null);
            }
        }

        return $this;
    }
}
