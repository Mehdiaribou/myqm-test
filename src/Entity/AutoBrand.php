<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AutoBrandRepository")
 */
class AutoBrand
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
    private $name;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\auto", mappedBy="marqueauto", orphanRemoval=true)
     */
    private $version;

    public function __construct()
    {
        $this->version = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
    /**
     * Generates the magic method
     * 
     */
    public function __toString(){
        // to show the name of the Category in the select
        return $this->name;
        // to show the id of the Category in the select
        // return $this->id;
    }
    /**
     * @return Collection|auto[]
     */
    public function getVersion(): Collection
    {
        return $this->version;
    }

    public function addVersion(auto $version): self
    {
        if (!$this->version->contains($version)) {
            $this->version[] = $version;
            $version->setMarqueauto($this);
        }

        return $this;
    }

    public function removeVersion(auto $version): self
    {
        if ($this->version->contains($version)) {
            $this->version->removeElement($version);
            // set the owning side to null (unless already changed)
            if ($version->getMarqueauto() === $this) {
                $version->setMarqueauto(null);
            }
        }

        return $this;
    }
}
