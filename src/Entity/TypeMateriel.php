<?php

namespace App\Entity;

use App\Repository\TypeMaterielRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeMaterielRepository::class)
 */
class TypeMateriel
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
    private $typemateriel;

    /**
     * @ORM\Column(type="boolean")
     */
    private $ventoryornot;

    /**
     * @ORM\OneToMany(targetEntity=Materiel::class, mappedBy="typeMaterial")
     */
    private $materiels;

    /**
     * @ORM\ManyToOne(targetEntity=Designation::class, inversedBy="typeMateriels")
     */
    private $designation;

    public function __construct()
    {
        $this->materiels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypemateriel(): ?string
    {
        return $this->typemateriel;
    }

    public function setTypemateriel(string $typemateriel): self
    {
        $this->typemateriel = $typemateriel;

        return $this;
    }

    public function getVentoryornot(): ?bool
    {
        return $this->ventoryornot;
    }

    public function setVentoryornot(bool $ventoryornot): self
    {
        $this->ventoryornot = $ventoryornot;

        return $this;
    }

    /**
     * @return Collection|Materiel[]
     */
    public function getMateriels(): Collection
    {
        return $this->materiels;
    }

    public function addMateriel(Materiel $materiel): self
    {
        if (!$this->materiels->contains($materiel)) {
            $this->materiels[] = $materiel;
            $materiel->setTypeMaterial($this);
        }

        return $this;
    }

    public function removeMateriel(Materiel $materiel): self
    {
        if ($this->materiels->removeElement($materiel)) {
            // set the owning side to null (unless already changed)
            if ($materiel->getTypeMaterial() === $this) {
                $materiel->setTypeMaterial(null);
            }
        }

        return $this;
    }

    public function getDesignation(): ?Designation
    {
        return $this->designation;
    }

    public function setDesignation(?Designation $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function __toString()
    {
        return $this->typemateriel;
    }
}
