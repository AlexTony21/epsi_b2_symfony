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
    		['Ember', 40, Type::TYPE_FIRE],
    		['Vine Whip', 45, Type::TYPE_PLANT],
    		['Bubble Beam', 65, Type::TYPE_WATER],
            ['Tackle', 40, Type::TYPE_NORMAL],
            ['Absorb', 20, Type::TYPE_PLANT],
            ['Accelerock', 40, Type::TYPE_ROCK],
            ['Acid', 40, Type::TYPE_POISON],
            ['Acid Spray', 40, Type::TYPE_POISON],
            ['Acrobatics', 55, Type::TYPE_FLYING],
            ['Aerial Ace', 60, Type::TYPE_FLYING],
            ['Aeroblast', 100, Type::TYPE_FLYING],
            ['Air Cutter', 60, Type::TYPE_FLYING],
            ['Air Slash', 75, Type::TYPE_FLYING],
            ['Anchor Shot', 80, Type::TYPE_STEEL],
            ['Ancient Power', 60, Type::TYPE_ROCK],
            ['Aqua Jet', 40, Type::TYPE_WATER],
            ['Aqua Tail', 90, Type::TYPE_WATER],
            ['Arm Thrust', 15, Type::TYPE_FIGHTING],
            ['Assurance', 60, Type::TYPE_DARK],
            ['Astonish', 30, Type::TYPE_GHOST],
            ['Attack Order', 90, Type::TYPE_BUG],
            ['Aura Sphere', 80, Type::TYPE_FIGHTING],
            ['Aurora Beam', 65, Type::TYPE_ICE],
            ['Avalanche', 60, Type::TYPE_ICE],
            ['Baddy Bad', 90, Type::TYPE_DARK],
            ['Barrage', 15, Type::TYPE_NORMAL],
            ['Beak Blast', 100, Type::TYPE_FLYING],
            ['Belch', 120, Type::TYPE_POISON],
            ['Bind', 15, Type::TYPE_NORMAL],
            ['Bite', 60, Type::TYPE_DARK],
            ['Blast Burn', 150, Type::TYPE_FIRE],
            ['Blaze Kick', 85, Type::TYPE_FIRE],
            ['Blizzard', 110, Type::TYPE_ICE],
            ['Blue Flare', 130, Type::TYPE_FIRE],
            ['Body Slam', 85, Type::TYPE_NORMAL],
            ['Bolt Strike', 130, Type::TYPE_ELECTRIC],
            ['Bone Club', 65, Type::TYPE_GROUND],
            ['Bone Rush', 25, Type::TYPE_GROUND],
            ['Bonemerang', 50, Type::TYPE_GROUND],
            ['Boomburst', 140, Type::TYPE_NORMAL],
            ['Bounce', 85, Type::TYPE_FLYING],
            ['Bouncy Bubble', 90, Type::TYPE_WATER],
            ['Brave Bird', 120, Type::TYPE_FLYING],
            ['Brick Break', 75, Type::TYPE_FIGHTING],
            ['Brine', 65, Type::TYPE_WATER],
            ['Brutal Swing', 60, Type::TYPE_DARK],
            ['Bubble', 40, Type::TYPE_WATER],
            ['Bug Bite', 60, Type::TYPE_BUG],
            ['Bug Buzz', 90, Type::TYPE_BUG],
            ['Bulldoze', 60, Type::TYPE_GROUND],
            ['Bullet Punch', 40, Type::TYPE_STEEL],
            ['Bullet Seed', 25, Type::TYPE_PLANT],
            ['Burn Up', 130, Type::TYPE_FIRE],
            ['Buzzy Buzz', 90, Type::TYPE_ELECTRIC],
            ['Charge Beam', 50, Type::TYPE_ELECTRIC],
            ['Chatter', 65, Type::TYPE_FLYING],
            ['Chip Away', 70, Type::TYPE_NORMAL],
            ['Circle Throw', 60, Type::TYPE_FIGHTING],
            ['Clamp', 35, Type::TYPE_WATER],
            ['Clanging Scales', 110, Type::TYPE_DRAGON],
            ['Clear Smog', 50, Type::TYPE_POISON],
            ['Close Combat', 120, Type::TYPE_FIGHTING],
            ['Comet Punch', 18, Type::TYPE_NORMAL],
            ['Confusion', 50, Type::TYPE_PSYCHIC],
            ['Constrict', 10, Type::TYPE_NORMAL],
            ['Core Enforcer', 100, Type::TYPE_DRAGON],
            ['Covet', 60, Type::TYPE_NORMAL],
            ['Crabbhammer', 100, Type::TYPE_WATER],
            ['Cross Chop', 100, Type::TYPE_FIGHTING],
            ['Cross Poison', 70, Type::TYPE_POISON],
            ['Crunch', 80, Type::TYPE_DARK],
            ['Crush Claw', 75, Type::TYPE_NORMAL]
    	];
    }
}