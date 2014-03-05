<?php 

require_once __DIR__ . '/../classes/Calculator.php';

class CalculatorTest extends PHPUnit_Framework_TestCase {
	
	public function test_add_numbers()
	{
		// Arrange
		$calculator = new Calculator(5, 6);
		// Act
		$sum = $calculator->add();
		// Assert
		$this->assertEquals(11, $sum);
	}
}





 ?>