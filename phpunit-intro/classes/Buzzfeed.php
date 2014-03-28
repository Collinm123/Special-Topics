<?php 

require_once __DIR__ . '/JsonCurl.php';

class Buzzfeed {
	public $status, $content;
	protected $jsonCurl;

	public function get()
	{
		$url = 'http://itpwebdev.herokuapp.com/buzzfeed';
		$jsonResponse = $this->

		$this->status = $data->status;

		return $data;
	}

	public function  __construct(JsonCurl $jsonCurl)
	{
		$this->jsonCurl = $jsonCurl;
	}



}

 ?>