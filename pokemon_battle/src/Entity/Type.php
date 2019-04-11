<?php

namespace App\Entity;

class Type
{
	const TYPE_WATER = 1;
	const TYPE_FIRE = 2;
	const TYPE_PLANT = 3;
	const TYPE_NORMAL = 4;

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