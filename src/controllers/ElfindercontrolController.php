<?php namespace Ferampe\Elfindercontrol;

use View;
use Config;
use Log;

class ElfindercontrolController extends \BaseController {

	protected $package = 'elfindercontrol';
	protected $asset_path = 'packages/ferampe/elfindercontrol';


	public function connector()
    {        
    	$folder_path = Config::get($this->package.'::folder_path');
    	$roots = Config::get($this->package.'::roots');

    	if(!$roots)
    	{
			$roots = array(
					array(
						'driver'        => 'LocalFileSystem',
						'path'          => public_path() . DIRECTORY_SEPARATOR .$folder_path,
						'URL'           => asset($folder_path),
						'accessControl' => Config::get($this->package . '::access')
					)
				);
    	}

        $opts = array('roots' => $roots);
		
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
