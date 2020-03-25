<?php

namespace Mercosur\Regimenes\ServiceProvider;

use Illuminate\Support\ServiceProvider;

class RegimenesServiceProvider extends ServiceProvider
{
	public function register()
	{
//		$this->register_classes();

//		$this->register_commands();

//		$this->register_config();
//
//		$this->register_migrations();

		$this->register_routes();

//		$this->register_views();
	}

	public function boot()
	{
		$this->loadTranslationsFrom(__DIR__ . '/../Translations', 'ordenado');
	}

	private function register_classes()
	{
		$this->app->bind('ordenado', function ($app) {
			return new Ordenado();
		});
	}

	private function register_commands()
	{
		if ($this->app->runningInConsole()) {
			$this->commands([
				Populate::class,
			]);
		}
	}

	private function register_config()
	{
//		$key = Menu::MERCOSUR_KEY;
//
//		$default_config = __DIR__ . '/../Config/' . $key . '.php';
//
//		$this->publishes([
//			$default_config => config_path($key . '.php'),
//		]);
//
//		$this->mergeConfigFrom($default_config, $key);
	}

	private function register_migrations()
	{
		$this->loadMigrationsFrom(__DIR__ . '/../Migrations');
	}

	private function register_routes()
	{
		$this->loadRoutesFrom(__DIR__ . '/../Routes/routes.php');
	}

	private function register_views()
	{
		$this->loadViewsFrom(__DIR__ . '/../Views', 'ordenado');
	}

}