<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Pokemon;
use App\Entity\Type;
use App\Entity\EquipePokemon;

class EQPPKMFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
    	foreach ($this -> getEqpPkm() as [$name, $pkm]) {
    		$eqppkm = new Pokemon;
    		$eqppkm
    			-> addDresseur($name)
    			-> addPokemon($pkm)
    		;

    		$manager->persist($eqppkm);
    	}

    	$manager->flush();

    }

    public function getEqpPkm()
    {
    	return [
    		[$this->getReference('Sacha'), [$this->getReference('Hericendre'), $this->getReference('Grenousse'), $this->getReference('Vipelierre')]]
    	];
    }

    public function getOrder()
    {
        return 6; // the order in which fixtures will be loaded
    }
}