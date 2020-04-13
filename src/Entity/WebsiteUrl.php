<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WebsiteUrlRepository")
 */
class WebsiteUrl
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
    private $url;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Prono", mappedBy="websiteUrl")
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

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

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
            $prono->setWebsiteUrl($this);
        }

        return $this;
    }

    public function removeProno(Prono $prono): self
    {
        if ($this->pronos->contains($prono)) {
            $this->pronos->removeElement($prono);
            // set the owning side to null (unless already changed)
            if ($prono->getWebsiteUrl() === $this) {
                $prono->setWebsiteUrl(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return$this->url;
    }
}
