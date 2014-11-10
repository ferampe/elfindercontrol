<?php namespace Ferampe\Elfindercontrol;

use View;
use Config;


class ElfindercontrolController extends \BaseController {

	protected $package = "elfindercontrol";

	public function showConnector()
    {        
    	$folder_path = Config::get($this->package.'::folder_path');

        $opts = array(			
			'roots' => array(
				array(
					'driver'        => 'LocalFileSystem',   // driver for accessing file system (REQUIRED)
					'path'          => public_path() . DIRECTORY_SEPARATOR .$folder_path,         // path to files (REQUIRED)
					'URL'           => asset($folder_path), // URL to files (REQUIRED)
					'accessControl' => 'access'// disable and hide dot starting files (OPTIONAL)
				)
			)
		);

        $connector = new \elFinderConnector(new \elFinder($opts));
        $connector->run();
    }

    public function elFinderSingle($input_id)
	{
		$lang = Config::get($this->package.'::lang');
		$asset_path = 'packages/ferampe/'.$this->package;
		$multiple = 'false';	
		return \View::make($this->package.'::elfinder')->with(compact('asset_path', 'lang', 'multiple', 'input_id'));		
	}

	public function elFinderMultiple($input_id)
	{
		$lang = Config::get($this->package.'::lang');
		$asset_path = 'packages/ferampe/'.$this->package;
		$multiple = 'true';	
		return \View::make($this->package.'::elfinder')->with(compact('asset_path', 'lang', 'multiple', 'input_id'));		
	}

	public function elFinderCkeditor4()
	{
		$lang = Config::get($this->package.'::lang');
		$asset_path = 'packages/ferampe/'.$this->package;
		$multiple = 'true';	
		return \View::make($this->package.'::elfinderckeditor4')->with(compact('asset_path', 'lang', 'multiple', 'input_id'));
	}

}
