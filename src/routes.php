<?php

Route::get('elFinderSingle/{input_id}', array('as' => 'elFinderSingle', 'uses' => 'Ferampe\Elfindercontrol\ElfindercontrolController@elFinderSingle'));

Route::get('elFinderMultiple/{input_id}', array('as' => 'elFinderMultiple', 'uses' => 'Ferampe\Elfindercontrol\ElfindercontrolController@elFinderMultiple'));

Route::get('elFinderCkeditor4', array('as' => 'elFinderCkeditor4', 'uses' => 'Ferampe\Elfindercontrol\ElfindercontrolController@elFinderCkeditor4'));



Route::get('elfinderConnector', array('as' => 'elfinderConnector', 'uses' => 'Ferampe\Elfindercontrol\ElfindercontrolController@showConnector'));
Route::post('elfinderConnector', array('as' => 'elfinderConnector', 'uses' => 'Ferampe\Elfindercontrol\ElfindercontrolController@showConnector'));

