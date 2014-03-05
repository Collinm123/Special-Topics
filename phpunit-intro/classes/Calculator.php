<?php 

class Calculator {
	protected $a, $b;

	public function __construct($a, $b)
	{
		$this->a = $a;
		$this->b = $b;
	}

	public function add()
	{
		return $this->a + $this->b;
	}

}

 ?>