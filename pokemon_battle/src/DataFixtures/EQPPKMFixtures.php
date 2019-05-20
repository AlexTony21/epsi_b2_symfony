<?php

namespace App\DataFixtures;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Pokemon;
use App\Entity\Type;
use App\Entity\EquipePokemon;
use App\DataFixtures\DRSFixtures;

class EQPPKMFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
    	foreach ($this -> getEqpPkm() as [$name, $pkm, $pkm2, $pkm3, $pv]) {
    		$eqppkm = new EquipePokemon;
    		$eqppkm
    			-> addDresseur($this->getReference($name))
    			-> addPokemon($this->getReference($pkm), $this->getReference($pkm2), $this->getReference($pkm3))
                -> setPV($pv)
    		;

    		$manager->persist($eqppkm);
    	}

    	$manager->flush();

    }

    public function getDependencies()
    {
        return [DRSFixtures::class];
    }

    public function getEqpPkm()
    {
    	return [
    		['Sacha', 'Hericendre', 'Grenousse', 'Vipelierre', 20]
    	];
    }

}