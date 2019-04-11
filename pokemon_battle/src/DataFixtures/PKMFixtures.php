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
    	}

    	$manager->flush();

    }

    public function getAttacks()
    {
    	return [
    		['Hericendre', 20, 'Flammeche', 'Charge', Type::TYPE_NORMAL],
    		['Grenousse', 20, 'Fouet Liane', 'Charge', Type::TYPE_PLANT],
    		['Vipelierre', 20, 'Bulle d\'O', 'Charge', Type::TYPE_WATER]
    	];
    }
}