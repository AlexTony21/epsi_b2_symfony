<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PokemonRepository")
 */
class Pokemon extends Master
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
    private $Name;

    /**
     * @ORM\Column(type="smallint")
     */
    private $Type;

    /**
     * @ORM\Column(type="integer")
     */
    private $PV;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ATK")
     */
    private $ATK;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EquipePokemon", inversedBy="Pokemons")
     * @ORM\JoinColumn(nullable=false)
     */
    private $equipePokemon;

    public function __construct()
    {
        parent::__construct();
        $this->ATK = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->Type;
    }

    public function setType(int $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getPV(): ?int
    {
        return $this->PV;
    }

    public function setPV(int $PV): self
    {
        $this->PV = $PV;

        return $this;
    }

    /**
     * @return Collection|ATK[]
     */
    public function getATK(): Collection
    {
        return $this->ATK;
    }

    public function addATK(ATK $aTK): self
    {
        if (!$this->ATK->contains($aTK)) {
            $this->ATK[] = $aTK;
        }

        return $this;
    }

    public function removeATK(ATK $aTK): self
    {
        if ($this->ATK->contains($aTK)) {
            $this->ATK->removeElement($aTK);
        }

        return $this;
    }

    public function getEquipePokemon(): ?EquipePokemon
    {
        return $this->equipePokemon;
    }

    public function setEquipePokemon(?EquipePokemon $equipePokemon): self
    {
        $this->equipePokemon = $equipePokemon;

        return $this;
    }
}
