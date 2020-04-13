<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PronoRepository")
 */
class Prono
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datetime;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CountryAndLeague", inversedBy="pronos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $countryAndLeague;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Team", inversedBy="pronos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $homeTeam;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Team", inversedBy="pronos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $visitorTeam;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Result", inversedBy="pronos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $result;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Website", inversedBy="pronos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $website;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\WebsiteUrl", inversedBy="pronos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $websiteUrl;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $odd;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatetime(): ?\DateTimeInterface
    {
        return $this->datetime;
    }

    public function setDatetime(\DateTimeInterface $datetime): self
    {
        $this->datetime = $datetime;

        return $this;
    }

    public function getCountryAndLeague(): ?CountryAndLeague
    {
        return $this->countryAndLeague;
    }

    public function setCountryAndLeague(?CountryAndLeague $countryAndLeague): self
    {
        $this->countryAndLeague = $countryAndLeague;

        return $this;
    }

    public function getHomeTeam(): ?Team
    {
        return $this->homeTeam;
    }

    public function setHomeTeam(?Team $homeTeam): self
    {
        $this->homeTeam = $homeTeam;

        return $this;
    }

    public function getVisitorTeam(): ?Team
    {
        return $this->visitorTeam;
    }

    public function setVisitorTeam(?Team $visitorTeam): self
    {
        $this->visitorTeam = $visitorTeam;

        return $this;
    }

    public function getResult(): ?Result
    {
        return $this->result;
    }

    public function setResult(?Result $result): self
    {
        $this->result = $result;

        return $this;
    }

    public function getWebsite(): ?Website
    {
        return $this->website;
    }

    public function setWebsite(?Website $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getWebsiteUrl(): ?WebsiteUrl
    {
        return $this->websiteUrl;
    }

    public function setWebsiteUrl(?WebsiteUrl $websiteUrl): self
    {
        $this->websiteUrl = $websiteUrl;

        return $this;
    }

    public function getOdd(): ?string
    {
        return $this->odd;
    }

    public function setOdd(string $odd): self
    {
        $this->odd = $odd;

        return $this;
    }
}
