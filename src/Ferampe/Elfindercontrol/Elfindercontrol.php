<?php namespace Ferampe\Elfindercontrol;

class Elfindercontrol {

	protected $package = 'elfindercontrol';

	public function getSingleElement($input_name = 'image')
	{
		return \View::make($this->package.'::singleelement');
	}

	public function getMultipleElements($input_name = 'images')
	{
		return \View::make($this->package.'::multipleelements');
	}




}