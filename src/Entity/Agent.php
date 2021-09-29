<?php

namespace App\Entity;

use App\Repository\AgentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AgentRepository::class)
 */
class Agent
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $agentnumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $agentname;

    /**
     * @ORM\ManyToMany(targetEntity=Services::class, mappedBy="agent")
     */
    private $services;

    /**
     * @ORM\ManyToOne(targetEntity=Agencies::class, inversedBy="agent")
     */
    private $agencies;

    public function __construct()
    {
        $this->services = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAgentnumber(): ?int
    {
        return $this->agentnumber;
    }

    public function setAgentnumber(int $agentnumber): self
    {
        $this->agentnumber = $agentnumber;

        return $this;
    }

    public function getAgentname(): ?string
    {
        return $this->agentname;
    }

    public function setAgentname(string $agentname): self
    {
        $this->agentname = $agentname;

        return $this;
    }

    /**
     * @return Collection|Services[]
     */
    public function getServices(): Collection
    {
        return $this->services;
    }

    public function addService(Services $service): self
    {
        if (!$this->services->contains($service)) {
            $this->services[] = $service;
            $service->addAgent($this);
        }

        return $this;
    }

    public function removeService(Services $service): self
    {
        if ($this->services->removeElement($service)) {
            $service->removeAgent($this);
        }

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
}
