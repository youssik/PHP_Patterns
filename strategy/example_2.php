<?php

abstract class AbstractCharacter 
{
	abstract public function talk();
	public function setWeapon(WeaponBehavior $weapon)
	{
		$this->weapon = $weapon;
	}

	public function attack()
	{
		if(isset($this->weapon)) {
			return $this->weapon->damage();
		} else {
			return 'No set weapon';
		}
	}
}

//поведение
Interface WeaponBehavior
{
	public function damage();
}

class Sword implements WeaponBehavior 
{
	public function damage()
	{
		return 150;
	}
}

class Axe implements WeaponBehavior
{
	public function damage()
	{
		return 120;
	}
}

//person
class King extends AbstractCharacter
{
	public function __construct()
	{
	}

	public function talk()
	{
		echo "I\'m the king!";
	}
}


$king = new King();
echo $king->talk();
echo "\n";
echo $king->attack();
echo "\n";
$king->setWeapon(new Axe());
echo $king->attack();
echo "\n";
$king->setWeapon(new Sword());
echo $king->attack();
echo "\n";

