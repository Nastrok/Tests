<?php

class ServiceUserTest extends PHPUnit_Framework_TestCase {
	
	protected $mock;
	protected $user;
	/*
	 * constructeur
	 */
	function __construct() {
		
		$this->user = $this->GetMockBuilder('Entities\\User')->getMock();
		$this->user->method('getNom')->will($this->returnValue('Machin'));
		$this->user->method('getPrenom')->will($this->returnValue('Trucmuch'));
		$this->user->method('getAge')->will($this->returnValue(12));
		
		$this->mock = $this->GetMockBuilder('DAO\\DAOUserSession')->getMock();
		
		$this->mock->method('get')->will($this->returnValue($this->user->getAge()));
		$this->mock->method('getUser')->will($this->returnValue($this->user));
		
	}
	/*
	 * @cover Service\ServiceUser::fullname();
	 */
	public function testFullName(){
		
		$service = new Service\ServiceUser($this->mock);
		$this->assertEquals('John John', $service->fullname());
		
	}
	/*
	 * @cover Service\ServiceUser::birthyear();
	 */
	public function testBirthyear(){
		
		$service = new Service\ServiceUser($this->mock);
		$this->assertEquals(36, $service->birthyear());
		
	}
	
}

?>