<?php namespace ABENEVAUT\Themes\App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\FileViewFinder;
use ABENEVAUT\Themes\Domain\Themes\Themes\Repositories\ThemesRepository;
use ABENEVAUT\Themes\Domain\Themes\Finder\Repositories\FinderRepository;

class ThemesServiceProvider extends ServiceProvider
{

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 */
	public function boot() {
		$this->registerConfig();

		$this->registerNamespaces();

		$this->registerHelpers();
	}

	/**
	 * Register the helpers file.
	 */
	public function registerHelpers() {
		require __DIR__ . '/../Services/helpers.php';
	}

	/**
	 * Register configuration file.
	 */
	protected function registerConfig() {
		$configPath = __DIR__ . '/../../config/config.php';

		$this->publishes([$configPath => config_path('themes.php')]);

		$this->mergeConfigFrom($configPath, 'themes');
	}

	/**
	 * Register the themes namespaces.
	 */
	protected function registerNamespaces() {
		$this->app['themes']->registerNamespaces();
	}

	/**
	 * Register the service provider.
	 */
	public function register() {
		$this->app['themes'] = $this->app->share(function($app)
		{
			return new ThemesRepository(
				new FinderRepository(),
				$app['config'],
				$app['view'],
				$app['translator'],
				$app['cache.store']
			);
		});

		$this->registerCommands();

		$this->overrideViewPath();
	}

	/**
	 * Override view path.
	 */
	protected function overrideViewPath() {
		$this->app->bind('view.finder', function($app)
		{
			$defaultThemePath = $app['config']['themes.path']
				. '/' . $app['config']['themes.default']
				. '/views';

			if (is_dir($defaultThemePath))
			{
				$paths = [$defaultThemePath];
			}
			else
			{
				$paths = $app['config']['view.paths'];
			}

			return new FileViewFinder($app['files'], $paths);
		});
	}

	/**
	 * Register commands.
	 */
	protected function registerCommands() {
		$this->commands('ABENEVAUT\Themes\Console\MakeCommand');
		$this->commands('ABENEVAUT\Themes\Console\CacheCommand');
		$this->commands('ABENEVAUT\Themes\Console\ListCommand');
		$this->commands('ABENEVAUT\Themes\Console\PublishCommand');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides() {
		return ['themes'];
	}
}
