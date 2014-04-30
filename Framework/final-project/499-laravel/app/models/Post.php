<?php

class Post extends Eloquent {

	protected $table = "posts";

	public static function validate($input)
    {
          $validation = Validator::make($input, [
            'body' => 'required',


          ]);

          return $validation;
    }

}
