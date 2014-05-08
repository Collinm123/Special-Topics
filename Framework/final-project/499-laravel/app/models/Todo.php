<?php

class Todo extends Eloquent {

	protected $table = "todos";

	public static function validate($input)
    {
    	$validation = Validator::make($input, [
            'body' => 'required',

          ]);

          return $validation;

    }

}

?>