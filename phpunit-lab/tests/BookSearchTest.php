<?php 

require_once __DIR__ . '/../classes/BookSearch.php';

class BookSearchTest extends PHPUnit_Framework_TestCase {
	protected $books;

	public function setUp()
	{
		$this->books = [
		  [ 'title' => 'Introduction to HTML and CSS', 'pages' => 432 ],
		  [ 'title' => 'Learning JavaScript Design Patterns', 'pages' => 32 ],
		  [ 'title' => 'Object Oriented JavaScript', 'pages' => 42 ],
		  [ 'title' => 'JavaScript Web Applications', 'pages' => 99 ],
		  [ 'title' => 'PHP Object Oriented Solutions', 'pages' => 80 ],
		  [ 'title' => 'PHP Design Patterns', 'pages' => 300 ],
		  [ 'title' => 'Head First Java', 'pages' => 200 ]
		];
	}

	public function tearDown()
	{
		
	}

	public function test_one()
	{
		//Arrange
		$search = new BookSearch($this->books);

		//Act
		$results = $search->find('javascript');

		//Assert
		$this->assertEquals($results, 'javascript');
	}

	public function test_two()
	{
		//Arrange
		$search = new BookSearch($this->books);

		// returns [ 'title' => JavaScript Web Applications', 'pages' => 99 ]
		$results = $search->find('javascript web applications', true);

		//Assert
		$this->assertEquals($results, 'javascript web applications');
	}

	public function test_three()
	{
		$search = new BookSearch($books);

		// returns false
		$results = $search->find('The Definitive Guide to Symfony', true);

		//Assert
		$this->assertEquals($results, 'The Definitive Guide to Symfony');
	}
	
}