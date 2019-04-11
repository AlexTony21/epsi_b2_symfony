<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EquipePokemonRepository")
 */
class EquipePokemon
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Dresseur", mappedBy="equipePokemon")
     */
    private $Dresseurs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Pokemon", mappedBy="equipePokemon")
     */
    private $Pokemons;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Surnom;

    /**
     * @ORM\Column(type="integer")
     */
    private $PV;

    public function __construct()
    {
        $this->Dresseurs = new ArrayCollection();
        $this->Pokemons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Dresseur[]
     */
    public function getDresseurs(): Collection
    {
        return $this->Dresseurs;
    }

    public function addDresseur(Dresseur $dresseur): self
    {
        if (!$this->Dresseurs->contains($dresseur)) {
            $this->Dresseurs[] = $dresseur;
            $dresseur->setEquipePokemon($this);
        }

        return $this;
    }

    public function removeDresseur(Dresseur $dresseur): self
    {
        if ($this->Dresseurs->contains($dresseur)) {
            $this->Dresseurs->removeElement($dresseur);
            // set the owning side to null (unless already changed)
            if ($dresseur->getEquipePokemon() === $this) {
                $dresseur->setEquipePokemon(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Pokemon[]
     */
    public function getPokemons(): Collection
    {
        return $this->Pokemons;
    }

    public function addPokemon(Pokemon $pokemon): self
    {
        if (!$this->Pokemons->contains($pokemon)) {
            $this->Pokemons[] = $pokemon;
            $pokemon->setEquipePokemon($this);
        }

        return $this;
    }

    public function removePokemon(Pokemon $pokemon): self
    {
        if ($this->Pokemons->contains($pokemon)) {
            $this->Pokemons->removeElement($pokemon);
            // set the owning side to null (unless already changed)
            if ($pokemon->getEquipePokemon() === $this) {
                $pokemon->setEquipePokemon(null);
            }
        }

        return $this;
    }

    public function getSurnom(): ?string
    {
        return $this->Surnom;
    }

    public function setSurnom(?string $Surnon): self
    {
        $this->Surnom = $Surnom;

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
}
