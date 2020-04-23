<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChartCurveRepository")
 */
class ChartCurve
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $odd;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ChartCurveResult", inversedBy="chartCurves")
     * @ORM\JoinColumn(nullable=false)
     */
    private $result;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOdd(): ?float
    {
        return $this->odd;
    }

    public function setOdd(float $odd): self
    {
        $this->odd = $odd;

        return $this;
    }

    public function getResult(): ?ChartCurveResult
    {
        return $this->result;
    }

    public function setResult(?ChartCurveResult $result): self
    {
        $this->result = $result;

        return $this;
    }
}
