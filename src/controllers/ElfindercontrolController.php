<?php namespace Ferampe\Elfindercontrol;

use View;
use Config;


class ElfindercontrolController extends \BaseController {

	protected $package = 'elfindercontrol';
	protected $asset_path = 'packages/ferampe/elfindercontrol';


	public function showConnector()
    {        
    	$folder_path = Config::get($this->package.'::folder_path');

    	$access = function ($attr, $path, $data, $volume) 
    		{
				return strpos(basename($path), '.') === 0       // if file/folder begins with '.' (dot)
					? !($attr == 'read' || $attr == 'write')    // set read+write to false, other (locked+hidden) set to true
					:  null;                                    // else elFinder decide it itself
			};


        $opts = array(			
			'roots' => array(
				array(
					'driver'        => 'LocalFileSystem',   // driver for accessing file system (REQUIRED)
					'path'          => public_path() . DIRECTORY_SEPARATOR .$folder_path,         // path to files (REQUIRED)
					'URL'           => asset($folder_path), // URL to files (REQUIRED)
					'accessControl' => $access// disable and hide dot starting files (OPTIONAL)
				)
			)
		);

		//$opts = Config::get($this->package.'::opts');

        $connector = new \elFinderConnector(new \elFinder($opts));
        $connector->run();
    }

    public function elFinderSingle($input_id)
	{
		$lang = Config::get($this->package.'::lang');
		$asset_path = $this->asset_path;
		$multiple = 'false';	
		return \View::make($this->package.'::elfinder')->with(compact('asset_path', 'lang', 'multiple', 'input_id'));		
	}

	public function elFinderMultiple($input_id)
	{
		$lang = Config::get($this->package.'::lang');
		$asset_path = $this->asset_path;
		$multiple = 'true';	
		return \View::make($this->package.'::elfinder')->with(compact('asset_path', 'lang', 'multiple', 'input_id'));		
	}

	public function elFinderCkeditor4()
	{
		$lang = Config::get($this->package.'::lang');
		$asset_path = $this->asset_path;
		$multiple = 'true';	
		return \View::make($this->package.'::elfinderckeditor4')->with(compact('asset_path', 'lang', 'multiple', 'input_id'));
	}

}
