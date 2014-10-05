<?php


interface AttackType
{
	public function damage();
}

class Sword implements AttackType
{
	public function damage()
	{
		return "Damage 120";
	}
}

class Hammer implements AttackType
{
	public function damage()
	{
		return "Damage 160";
	}
}

class Cudgel implements AttackType
{
	public function damage()
	{
		return "Damage 80";
	}
}

abstract class PersonCharacter
{
	private $_name;

	public function __construct(AttackType $type)
	{
		$this->_attackType = $type;
	}

	public function speak()
	{
		return "I'am " . $this->_name;
	}

	public function setName($name)
	{
		$this->_name = $name;
	}

	public function attack()
	{
		return $this->_attackType->damage();
	}

	public function setWeapon(AttackType $type)
	{
		$this->_attackType = $type;
	}
}

class Troll extends PersonCharacter
{
	public function __construct($type)
	{
		$this->setName("Troll");
		parent::__construct($type);
	}
}

class Knight extends PersonCharacter
{
	public function __construct($type)
	{
		$this->setName("Knight");
		parent::__construct($type);
	}
}

////////////////////////////////////////

$sword  = new Sword();
$hammer = new Hammer();
$cudgel = new Cudgel();

$personTroll  = new Troll($sword);
$personKnight = new Knight($sword);

//troll
echo $personTroll->speak();
echo "\n";
echo $personTroll->attack();
echo "\n";
$personTroll->setWeapon($hammer);
echo $personTroll->attack();
echo "\n";
echo $personTroll->setWeapon($cudgel);
echo $personTroll->attack();
echo "\n";

//knight
echo $personKnight->speak();
echo "\n";
echo $personKnight->attack();
echo "\n";
$personKnight->setWeapon($hammer);
echo $personKnight->attack();
echo "\n";
echo $personKnight->setWeapon($cudgel);
echo $personKnight->attack();
echo "\n";
