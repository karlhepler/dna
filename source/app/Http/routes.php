<?php

$app->group(['prefix' => 'api', 'namespace' => 'App\Http\Controllers'], function() use ($app) {

	$app->get('search', 'ApiController@search');

});
