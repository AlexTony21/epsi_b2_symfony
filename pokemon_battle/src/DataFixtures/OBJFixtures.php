<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Pokemon;
use App\Entity\Type;
use App\Entity\Objects;

class OBJFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
    	foreach ($this -> getObj() as [$name, $effet]) {
    		$obj = new Objects;
    		$obj
    			-> setNom($name)
    			-> setEffet($effet)
    		;

    		$manager->persist($obj);
    	}

    	$manager->flush();

    }

    public function getObj()
    {
    	return [
    		["Potion", "Soigne de 20 PV"],
    		["Super Potion", "Soigne de 50 PV"],
    		["Hyper Potion", "Soigne de 200 PV"]
    	];
    }
}