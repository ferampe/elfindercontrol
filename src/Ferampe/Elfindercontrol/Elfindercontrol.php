<?php namespace Ferampe\Elfindercontrol;

class Elfindercontrol {

	protected $package = 'elfindercontrol';
	protected $asset_path = 'packages/ferampe/elfindercontrol';

	public function getSingleElement($input_name = 'image')
	{
		$asset_path = $this->asset_path;
		return \View::make($this->package.'::singleelement')->with(compact('input_name', 'asset_path'));
	}

	public function getMultipleElements($input_name = 'images')
	{
		$asset_path = $this->asset_path;
		return \View::make($this->package.'::multipleelements')->with(compact('input_name', 'asset_path'));
	}




}