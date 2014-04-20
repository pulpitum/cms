<?php

$pages = new \Pulpitum\Cms\Models\Pages;
$list = $pages->where("is_active",1)->get();
foreach ($list as $value) {
	Route::get($value->identifier, array('as' => $value->identifier, 'uses' => 'Pulpitum\Cms\Controllers\PagesController@getView'));
}

