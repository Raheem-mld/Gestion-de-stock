<?php

namespace App\Entity;

use App\Repository\MaterielRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MaterielRepository::class)
 */
class Materiel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $numeroinventaire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $garantie;

    /**
     * @ORM\Column(type="date")
     */
    private $datedereception;

    /**
     * @ORM\Column(type="boolean")
     */
    private $affecter;

    /**
     * @ORM\ManyToOne(targetEntity=Fournisseur::class, inversedBy="materiels")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fournisseur;

    /**
     * @ORM\ManyToOne(targetEntity=Agencies::class, inversedBy="materiels")
     */
    private $agencies;

    /**
     * @ORM\ManyToOne(targetEntity=TypeMateriel::class, inversedBy="materiels")
     */
    private $typeMaterial;

    /**
     * @ORM\ManyToOne(targetEntity=Designation::class, inversedBy="materiels")
     */
    private $designation;

    /**
     * @ORM\ManyToOne(targetEntity=Services::class, inversedBy="materiels")
     */
    private $service;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroinventaire(): ?float
    {
        return $this->numeroinventaire;
    }

    public function setNumeroinventaire(float $numeroinventaire): self
    {
        $this->numeroinventaire = $numeroinventaire;

        return $this;
    }

    public function getGarantie(): ?string
    {
        return $this->garantie;
    }

    public function setGarantie(string $garantie): self
    {
        $this->garantie = $garantie;

        return $this;
    }

    public function getDatedereception(): ?\DateTimeInterface
    {
        return $this->datedereception;
    }

    public function setDatedereception(\DateTimeInterface $datedereception): self
    {
        $this->datedereception = $datedereception;

        return $this;
    }

    public function getAffecter(): ?bool
    {
        return $this->affecter;
    }

    public function setAffecter(bool $affecter): self
    {
        $this->affecter = $affecter;

        return $this;
    }

    public function getFournisseur(): ?Fournisseur
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?Fournisseur $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getAgencies(): ?Agencies
    {
        return $this->agencies;
    }

    public function setAgencies(?Agencies $agencies): self
    {
        $this->agencies = $agencies;

        return $this;
    }

    public function getTypeMaterial(): ?TypeMateriel
    {
        return $this->typeMaterial;
    }

    public function setTypeMaterial(?TypeMateriel $typeMaterial): self
    {
        $this->typeMaterial = $typeMaterial;

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

    public function getService(): ?Services
    {
        return $this->service;
    }

    public function setService(?Services $service): self
    {
        $this->service = $service;

        return $this;
    }
}
