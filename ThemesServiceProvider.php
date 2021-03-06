<?php namespace Pingpong\Themes;

use Illuminate\Support\ServiceProvider;

class ThemesServiceProvider extends ServiceProvider {

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
        $this->package('pingpong/themes', 'themes', __DIR__ . '/src');

        $this->registerNamespaces();
    }

    /**
     * Register the themes namespaces.
     */
    protected function registerNamespaces()
    {
        $this->app['themes']->registerNamespaces();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['themes'] = $this->app->share(function ($app)
        {
            $finder = new Finder($app['files'], $app['config']);

            return new Theme($finder, $app['config'], $app['view'], $app['translator']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('themes');
    }

}
