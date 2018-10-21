<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HouseholdRepository")
 */
class Household
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CharityCase", inversedBy="households")
     * @ORM\JoinColumn(nullable=false)
     */
    private $charity_case;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCharityCase(): ?CharityCase
    {
        return $this->charity_case;
    }

    public function setCharityCase(?CharityCase $charity_case): self
    {
        $this->charity_case = $charity_case;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
