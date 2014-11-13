<?php namespace Ferampe\Elfindercontrol;

class Elfindercontrol {

	protected $package = 'elfindercontrol';	

	public function getSingleElement($parameter = array())
	{
		return \View::make($this->package.'::singleelement')->with(compact('parameter'));
	}

	public function getMultipleElements($parameter = array())
	{
		return \View::make($this->package.'::multipleelements')->with(compact('parameter'));
	}

	public static function access($attr, $path, $data, $volume) 
	{
		return strpos(basename($path), '.') === 0       // if file/folder begins with '.' (dot)
			? !($attr == 'read' || $attr == 'write')    // set read+write to false, other (locked+hidden) set to true
			:  null;                                    // else elFinder decide it itself
	}


}