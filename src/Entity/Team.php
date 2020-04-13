<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TeamRepository")
 */
class Team
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
     * @ORM\OneToMany(targetEntity="App\Entity\Prono", mappedBy="homeTeam")
     */
    private $pronos;

    public function __construct()
    {
        $this->pronos = new ArrayCollection();
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

    /**
     * @return Collection|Prono[]
     */
    public function getPronos(): Collection
    {
        return $this->pronos;
    }

    public function addProno(Prono $prono): self
    {
        if (!$this->pronos->contains($prono)) {
            $this->pronos[] = $prono;
            $prono->setHomeTeam($this);
        }

        return $this;
    }

    public function removeProno(Prono $prono): self
    {
        if ($this->pronos->contains($prono)) {
            $this->pronos->removeElement($prono);
            // set the owning side to null (unless already changed)
            if ($prono->getHomeTeam() === $this) {
                $prono->setHomeTeam(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return$this->name;
    }
}
