<?php namespace Ferampe\Elfindercontrol;

use View;
use Config;
use Log;
use Response;


class ElfindercontrolController extends \BaseController {

	protected $package = 'elfindercontrol';
	protected $asset_path = 'packages/ferampe/elfindercontrol';


	public function showConnector()
    {        
    	$folder_path = Config::get($this->package.'::folder_path');
    	$roots = Config::get($this->package.'::roots');

    	Log::info('Mi info -- '.serialize($folder_path));

    	/*$access = function ($attr, $path, $data, $volume) 
    		{
				return strpos(basename($path), '.') === 0       // if file/folder begins with '.' (dot)
					? !($attr == 'read' || $attr == 'write')    // set read+write to false, other (locked+hidden) set to true
					:  null;                                    // else elFinder decide it itself
			};*/

        $opts = array(			
			'roots' => array(
				array(
					'driver'        => 'LocalFileSystem',
					'path'          => public_path() . DIRECTORY_SEPARATOR .$folder_path,
					'URL'           => asset($folder_path)
				)
			)
		);


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
