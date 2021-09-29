<?php

namespace App\Entity;

use App\Repository\DesignationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DesignationRepository::class)
 */
class Designation
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
    private $designation;

    /**
     * @ORM\OneToMany(targetEntity=Materiel::class, mappedBy="designation")
     */
    private $materiels;

    /**
     * @ORM\OneToMany(targetEntity=TypeMateriel::class, mappedBy="designation")
     */
    private $typeMateriels;

    public function __construct()
    {
        $this->materiels = new ArrayCollection();
        $this->typeMateriels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

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
            $materiel->setDesignation($this);
        }

        return $this;
    }

    public function removeMateriel(Materiel $materiel): self
    {
        if ($this->materiels->removeElement($materiel)) {
            // set the owning side to null (unless already changed)
            if ($materiel->getDesignation() === $this) {
                $materiel->setDesignation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TypeMateriel[]
     */
    public function getTypeMateriels(): Collection
    {
        return $this->typeMateriels;
    }

    public function addTypeMateriel(TypeMateriel $typeMateriel): self
    {
        if (!$this->typeMateriels->contains($typeMateriel)) {
            $this->typeMateriels[] = $typeMateriel;
            $typeMateriel->setDesignation($this);
        }

        return $this;
    }

    public function removeTypeMateriel(TypeMateriel $typeMateriel): self
    {
        if ($this->typeMateriels->removeElement($typeMateriel)) {
            // set the owning side to null (unless already changed)
            if ($typeMateriel->getDesignation() === $this) {
                $typeMateriel->setDesignation(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->designation;
    }
}
