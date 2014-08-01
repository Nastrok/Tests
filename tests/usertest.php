<?php

class UserTest extends PHPUnit_Framework_TestCase {
	
	public function testgetPrenom(){
		$user = new Entity\User('Trucmuch', 'Machin', 12);
		$this->assertEquals('Machin', $user->getPrenom());
	}
	
}

