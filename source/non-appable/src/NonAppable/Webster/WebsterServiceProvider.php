<?php

namespace NonAppable\Webster;

use NonAppable\Webster\Api;
use Illuminate\Support\ServiceProvider;
use NonAppable\Webster\Factories\WordsFactory;
use NonAppable\Webster\SimpleXMLHttpConnection;
use NonAppable\Webster\Specifications\WordIsDefinable;
use NonAppable\Webster\Adapters\LaravelEventDispatcher;
use NonAppable\Webster\References\ElementaryDictionary;
use NonAppable\Webster\References\IntermediateDictionary;

class WebsterServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
		$this->registerElementaryDictionary();
		$this->registerIntermediateDictionary();
		$this->registerWebsterApi();
    }

	/**
	 * Register the elementary dictionary
	 */
	protected function registerElementaryDictionary()
	{
		$this->app->singleton(ElementaryDictionary::class, function($app) {
			return new ElementaryDictionary(
				$app['config']['webster']['dictionaries']['elementary']['code'],
				$app['config']['webster']['dictionaries']['elementary']['key']
			);
		});
	}

	/**
	 * Register the intermediate dictionary
	 */
	protected function registerIntermediateDictionary()
	{
		$this->app->singleton(IntermediateDictionary::class, function($app) {
			return new IntermediateDictionary(
				$app['config']['webster']['dictionaries']['intermediate']['code'],
				$app['config']['webster']['dictionaries']['intermediate']['key']
			);
		});
	}

	/**
	 * Register the Webster API
	 */
	protected function registerWebsterApi()
	{
		$this->app->singleton(Api::class, function($app) {
			return new Api(
				new SimpleXMLHttpConnection,
				new WordsFactory(
					new LaravelEventDispatcher($app['events']),
					new WordIsDefinable
				)
			);
		});
	}
}
