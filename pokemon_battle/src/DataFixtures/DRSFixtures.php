<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Dresseur;

class DRSFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
    	foreach ($this -> getDresseur() as [$Nom, $role, $pwd]) {
    		$dresseur = new Dresseur;
    		$dresseur
    			-> setNom($Nom)
    			-> setRoles($role)
                -> setPassword($pwd)
    		;

    		$manager->persist($dresseur);
    	}

    	$manager->flush();

    }

    public function getDresseur()
    {
    	return [
    		['Admin', ['ROLE_ADMIN'], 'Admin'],
    		['Sacha', ['ROLE_USER'], 'Ça chatouille']
    	];
    }
}