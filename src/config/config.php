<?php

return array(
	/*
	Put the name of the folder where the files were stored, relative to folder public your project
	 */
    'folder_path' => 'files',

    /*
    Especific language.
     */
    'lang' => 'es',

    /*
    Especific more Opts to elfinder
     */
    'roots' => array(
                array(
                    'driver'        => 'LocalFileSystem',
                    'path'          => public_path() . DIRECTORY_SEPARATOR .'files',
                    'URL'           => asset('files')
                )
            )
);
