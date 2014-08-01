<?php

class ServiceUserTest extends PHPUnit_Framework_TestCase {
	
	protected $dao;

	/*
	 * constructeur
	 */
	function __construct() {
		
		$user = $this->GetMockBuilder('Entity\\User')->disableOriginalConstructor()->getMock();
		$user->method('getNom')->will($this->returnValue('Machin'));
		$user->method('getPrenom')->will($this->returnValue('Trucmuch'));
		$user->method('getAge')->will($this->returnValue(12));
		
		$this->dao = $this->GetMockBuilder('DAO\\DAOUserSession')->disableOriginalConstructor()->getMock();

		var_dump($user->getAge());
		var_dump($user->getPrenom());
		var_dump($user->getNom());
		
		$this->dao->method('get')->will($this->returnValue($user->getAge()));

		$this->dao->method('getUser')->will($this->returnValue($user));
		
	}
	/*
	 * @cover Service\ServiceUser::fullName();
	 */
	public function testFullName(){
		
		$service = new Service\ServiceUser($this->dao);
		$this->assertEquals('Trucmuch Machin', $service->fullName());
		
	}
	/*
	 * @cover Service\ServiceUser::birthyear();
	 */
	public function testBirthyear(){
		
		$service = new Service\ServiceUser($this->dao);
		$this->assertEquals(date('Y') - 12, $service->birthyear());
		
	}
	
}

?>
