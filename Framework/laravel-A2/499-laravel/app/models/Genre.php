
<?php

class Genre extends Eloquent{

	public function dvds()
	{
		return $this->hasMany('DVD');
	}

}