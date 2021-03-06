<?php namespace Pulpitum\Cms;

use Illuminate\Support\ServiceProvider;

class CmsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('pulpitum/cms');
		include __DIR__.'/../../routes.php';
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$searchable = array("pages"=>"Pulpitum\Cms\Models\Pages");
		if(!isset($this->app['searchable'])){
			$this->app['searchable'] = $searchable;
		}else{
			$this->app['searchable'] = array_merge($this->app['searchable'], $searchable);
		}

        $this->app->booting(function()
        {
          $loader = \Illuminate\Foundation\AliasLoader::getInstance();
          $loader->alias('Pages', 'Pulpitum\Cms\Models\Pages');
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
