<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AutoRepository")
 */
class Auto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $version;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $motorisation;

    /**
     * @ORM\Column(type="boolean")
     */
    private $airbags;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $performance;

    /**
     * @ORM\Column(type="string", length=2000)
     */
    private $details;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $couleurs;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photos;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\AutoBrand", inversedBy="version")
     * @ORM\JoinColumn(nullable=false)
     */
    private $marqueauto;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getMotorisation(): ?string
    {
        return $this->motorisation;
    }

    public function setMotorisation(string $motorisation): self
    {
        $this->motorisation = $motorisation;

        return $this;
    }

    public function getAirbags(): ?bool
    {
        return $this->airbags;
    }

    public function setAirbags(bool $airbags): self
    {
        $this->airbags = $airbags;

        return $this;
    }

    public function getPerformance(): ?string
    {
        return $this->performance;
    }

    public function setPerformance(string $performance): self
    {
        $this->performance = $performance;

        return $this;
    }

    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function setDetails(string $details): self
    {
        $this->details = $details;

        return $this;
    }

    public function getCouleurs(): ?string
    {
        return $this->couleurs;
    }

    public function setCouleurs(string $couleurs): self
    {
        $this->couleurs = $couleurs;

        return $this;
    }

    public function getPhotos(): ?string
    {
        return $this->photos;
    }

    public function setPhotos(string $photos): self
    {
        $this->photos = $photos;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getMarqueauto(): ?AutoBrand
    {
        return $this->marqueauto;
    }

    public function setMarqueauto(?AutoBrand $marqueauto): self
    {
        $this->marqueauto = $marqueauto;

        return $this;
    }
}
