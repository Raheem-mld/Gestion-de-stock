<?php

namespace App\Entity;

use App\Repository\AgenciesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AgenciesRepository::class)
 */
class Agencies
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
    private $agencyname;

    /**
     * @ORM\OneToMany(targetEntity=Materiel::class, mappedBy="agencies")
     */
    private $materiels;

    /**
     * @ORM\OneToMany(targetEntity=Agent::class, mappedBy="agencies")
     */
    private $agent;

    public function __construct()
    {
        $this->materiels = new ArrayCollection();
        $this->agent = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAgencyname(): ?string
    {
        return $this->agencyname;
    }

    public function setAgencyname(string $agencyname): self
    {
        $this->agencyname = $agencyname;

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
            $materiel->setAgencies($this);
        }

        return $this;
    }

    public function removeMateriel(Materiel $materiel): self
    {
        if ($this->materiels->removeElement($materiel)) {
            // set the owning side to null (unless already changed)
            if ($materiel->getAgencies() === $this) {
                $materiel->setAgencies(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Agent[]
     */
    public function getAgent(): Collection
    {
        return $this->agent;
    }

    public function addAgent(Agent $agent): self
    {
        if (!$this->agent->contains($agent)) {
            $this->agent[] = $agent;
            $agent->setAgencies($this);
        }

        return $this;
    }

    public function removeAgent(Agent $agent): self
    {
        if ($this->agent->removeElement($agent)) {
            // set the owning side to null (unless already changed)
            if ($agent->getAgencies() === $this) {
                $agent->setAgencies(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->agencyname;
    }
}
