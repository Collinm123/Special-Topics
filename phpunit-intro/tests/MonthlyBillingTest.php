<?php 

require_once __DIR__ . '/../classes/MonthlyBilling.php';

class MonthlyBillingTest extends PHPUnit_Framework_TestCase {


	public function setUp()
	{
		$this->data = [
			['campaign' => 'C 1', 'spent' => 10],
			['campaign' => 'C 2', 'spent' => 20],
			['campaign' => 'C 3', 'spent' => 30]
		];
	}

	public function tearDown()
	{

	}

	public function test_total_with_cr()
	{
		// Arrange
		$bill = new MonthlyBilling($this->data, 0.10);

		// Act
		$total = $bill->total();

		// Assert
		$this->assertEquals(60 * 0.10, $total);

	}

	public function test_total_without_cr()
	{
		// Arrange
		$bill = new MonthlyBilling($this->data);

		// Act
		$total = $bill->total();

		// Assert
		$this->assertEquals(60 * 0.10, $total);
	}

	public function test_get_invoice_items()
	{
		// Arrange
		$bill = new MonthlyBilling($this->data);

		// Act
		$items = $bill->getInvoiceItems();

		$expected = [
			['campaign' => 'C 1', 'total' => 10 * 0.10],
			['campaign' => 'C 2', 'total' => 20 * 0.10],
			['campaign' => 'C 3', 'total' => 30 * 0.10],
		];

		// Assert
		$this->assertEquals($expected, $items);
	}

}



 ?>