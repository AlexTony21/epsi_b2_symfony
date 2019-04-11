<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\ATK;
use App\Entity\Type;

class ATKFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
    	foreach ($this -> getAttacks() as [$name, $pwr, $type]) {
    		$attack = new ATK;
    		$attack
    			-> setName($name)
    			-> setPWR($pwr)
    			-> setType($type)
    		;

    		$manager->persist($attack);
    		$reference = $this->addReference($name, $attack);
    	}

    	$manager->flush();

    }

    public function getAttacks()
    {
    	return [
    		['Flammeche', 50, Type::TYPE_FIRE],
    		['Fouet Liane', 70, Type::TYPE_PLANT],
    		['Bulle d\'O', 40, Type::TYPE_WATER],
            ['Charge', 40, Type::TYPE_NORMAL]
    	];
    }
}