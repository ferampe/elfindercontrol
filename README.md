ElFinder Control
===============

This Laravel packages is based [Studio-42/elFinder](https://github.com/Studio-42/elFinder), We can call control elFinder 
from input standalone, multiple elements and also we can configured to ckeditor4.

##Installation

Add in your composer.json

```
"ferampe/elfindercontrol": "dev-master"
```

Add the ElfindercontrolServiceProvider in your app/config/app.php providers array.

```
'Ferampe\Elfindercontrol\ElfindercontrolServiceProvider',
```

Add Facade in your app/config/app.php aliases array

```
'ElFinderControl' => 'Ferampe\Elfindercontrol\Facades\Elfindercontrol',
```

Now We need publish asset

```
php artisan asset:publish ferampe/elfindercontrol
```

##Configuration

We have to set the folder where the images will be stored, **create a folder with the files name in your public folder**, if you want change folder stored files, go to app/config/packages/ferampe/elfindercontrol/config.php and change name folder.

```
php artisan config:publish ferampe/elfindercontrol
```

##Use

According to your needs, you can add the routes that call elfindercontrol, the elfinderConnector path must always exist.

```
Route::get('elFinderSingle/{input_id}', array('as' => 'elFinderSingle', 'uses' => 'Ferampe\Elfindercontrol\ElfindercontrolController@elFinderSingle'));
Route::get('elFinderMultiple/{input_id}', array('as' => 'elFinderMultiple', 'uses' => 'Ferampe\Elfindercontrol\ElfindercontrolController@elFinderMultiple'));
Route::get('elFinderCkeditor4', array('as' => 'elFinderCkeditor4', 'uses' => 'Ferampe\Elfindercontrol\ElfindercontrolController@elFinderCkeditor4'));

Route::any('elfinderConnector', array('as' => 'elfinderConnector', 'uses' => 'Ferampe\Elfindercontrol\ElfindercontrolController@connector'));

```

For Single Element.

```
Route::get('/myControl', function() 
{
    return ElFinderControl::getSingleElement(array('input_name' => 'icon', 'button_text' => 'search'));
});
```

For Multiple Elements, inside control elFinder select multiple elements and right click "select files".

```
Route::get('/myControl', function() 
{
    return ElFinderControl::getMultipleElements(array('input_name' => 'icon', 'button_text' => 'search'));
});
```

For CkEditor 4, in your config.js

```
config.filebrowserBrowseUrl = '{{{ url("elFinderCkeditor4") }}}';
```

**For more flexibility**, you can publish view and add more elements to your custom view, add more parameters in the methods getSingleElement, getMultipleElements.

```
php artisan view:publish ferampe/elfindercontrol
```
Go to views/packages/ferampe/elfindercontrol and change templates.
