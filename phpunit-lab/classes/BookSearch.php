<?php 

class BookSearch {

	protected $books;

	public function __construct($books)
	{
		$this->books = $books;

	}

	public function find($title, $pages)
	{	
		foreach ($this->books as $book) {
			if ($book['title'] = $title) {
				return $title;
			}
		}
	}


}