<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChartCurveResultRepository")
 */
class ChartCurveResult
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
    private $result;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ChartCurve", mappedBy="result")
     */
    private $chartCurves;

    public function __construct()
    {
        $this->chartCurves = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getResult(): ?string
    {
        return $this->result;
    }

    public function setResult(string $result): self
    {
        $this->result = $result;

        return $this;
    }

    /**
     * @return Collection|ChartCurve[]
     */
    public function getChartCurves(): Collection
    {
        return $this->chartCurves;
    }

    public function addChartCurve(ChartCurve $chartCurve): self
    {
        if (!$this->chartCurves->contains($chartCurve)) {
            $this->chartCurves[] = $chartCurve;
            $chartCurve->setResult($this);
        }

        return $this;
    }

    public function removeChartCurve(ChartCurve $chartCurve): self
    {
        if ($this->chartCurves->contains($chartCurve)) {
            $this->chartCurves->removeElement($chartCurve);
            // set the owning side to null (unless already changed)
            if ($chartCurve->getResult() === $this) {
                $chartCurve->setResult(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return$this->result;
    }
}
