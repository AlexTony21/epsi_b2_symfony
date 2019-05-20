<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Pokemon;
use App\Entity\Type;

class PKMFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
    	foreach ($this -> getAttacks() as [$name, $pv, $atk, $atk2, $type]) {
    		$pkm = new Pokemon;
    		$pkm
    			-> setName($name)
    			-> setPV($pv)
                -> addATK($this->getReference($atk))
                -> addATK($this->getReference($atk2))
    			-> setType($type)
    		;

    		$manager->persist($pkm);
            $reference = $this -> addReference($name, $pkm);
    	}

    	$manager->flush();

    }

    public function getAttacks()
    {
    	return [
    		['Hericendre', 20, 'Ember', 'Tackle', Type::TYPE_FIRE],
    		['Grenousse', 20, 'Vine Whip', 'Tackle', Type::TYPE_WATER],
    		['Vipelierre', 20, 'Bubble Beam', 'Tackle', Type::TYPE_PLANT]
    	];
    }
}