<?php 

	require __DIR__ . '/../classes/Buzzfeed.php';

	class BuzzfeedTest extends PHPUnit_Framework_TestCase {

		public function test_status_is_error()
		{

			$errorJson = '{"status": "error", "message": "Aw Snap! Something went wrong!"}';
			$mock = $this->getMock('JsonCurl');
			$mock
				->expects($this->once())
				->method('request')
				->will($this->returnValue(json_decode($errorJson));

			$buzzfeed = new Buzzfeed($mock);
			$results = $buzzfeed->get();

			var_dump($results);

			$this->assertEquals('error', $buzzfeed->status);
		}


		public function test_sets_data()
		{
			$jsonData = file_get_contents(__DIR__ . '/json-success-fixture.json');
			$mock = $this->getMock('JsonCurl');
			$mock
				->expects($this->once())
				->method('request')
				->will($this->returnValue());


			$buzzfeed = new Buzzfeed($mock);
			$results = $buzzfeed->get();
			$this->assertCount(5, $buzzfeed->content);

		}

	}



 ?>