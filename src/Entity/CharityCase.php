<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CharityCaseRepository")
 */
class CharityCase
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $first_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $last_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $assisted;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $first_seen;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $benefit;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comments;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Household", mappedBy="charity_case")
     */
    private $households;

    public function __construct()
    {
        $this->households = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(?string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(?string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getAssisted(): ?int
    {
        return $this->assisted;
    }

    public function setAssisted(?int $assisted): self
    {
        $this->assisted = $assisted;

        return $this;
    }

    public function getFirstSeen(): ?\DateTimeInterface
    {
        return $this->first_seen;
    }

    public function setFirstSeen(?\DateTimeInterface $first_seen): self
    {
        $this->first_seen = $first_seen;

        return $this;
    }

    public function getBenefit(): ?string
    {
        return $this->benefit;
    }

    public function setBenefit(?string $benefit): self
    {
        $this->benefit = $benefit;

        return $this;
    }

    public function getComments(): ?string
    {
        return $this->comments;
    }

    public function setComments(?string $comments): self
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * @return Collection|Household[]
     */
    public function getHouseholds(): Collection
    {
        return $this->households;
    }

    public function addHousehold(Household $household): self
    {
        if (!$this->households->contains($household)) {
            $this->households[] = $household;
            $household->setCharityCase($this);
        }

        return $this;
    }

    public function removeHousehold(Household $household): self
    {
        if ($this->households->contains($household)) {
            $this->households->removeElement($household);
            // set the owning side to null (unless already changed)
            if ($household->getCharityCase() === $this) {
                $household->setCharityCase(null);
            }
        }

        return $this;
    }
}
