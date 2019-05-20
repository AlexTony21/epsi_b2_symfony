<?php

namespace App\Entity;

class Type
{
	const TYPE_WATER = 1;
	const TYPE_FIRE = 2;
	const TYPE_PLANT = 3;
	const TYPE_NORMAL = 4;
	const TYPE_ELECTRIC = 5;
	const TYPE_FIGHTING	= 6;
	const TYPE_GROUND = 7;
	const TYPE_PSYCHIC = 8;
	const TYPE_ROCK = 9;
	const TYPE_DARK = 10;
	const TYPE_STEEL = 11;
	const TYPE_ICE = 12;
	const TYPE_POISON = 13;
	const TYPE_FLYING = 14;
	const TYPE_BUG = 15;
	const TYPE_GHOST = 16;
	const TYPE_DRAGON = 17;
	const TYPE_FAIRY = 18;

	public function isWeakAgainst($typePKM, $typeATK)
	{
		if ($typeATK == 1)
		{
			if ($typePKM == 3)
				return true;
			else
				return false;
		}
		else if ($typeATK == 2)
		{
			if ($typePKM == 1)
				return true;
			else
				return false;
		}
		else if ($typeATK == 3)
		{
			if ($typePKM == 2)
				return true;
			else
				return false;
		}
	}

	public function isStrongAgainst($typeATK, $typePKM)
	{
		if ($typeATK == 1)
		{
			if ($typePKM == 2)
				return true;
			else
				return false;
		}
		else if ($typeATK == 2)
		{
			if ($typePKM == 3)
				return true;
			else
				return false;
		}
		else if ($typeATK == 3)
		{
			if ($typePKM == 1)
				return true;
			else
				return false;
		}
	}

}