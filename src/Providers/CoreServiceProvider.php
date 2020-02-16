<?php

namespace Ministrare\Cmscore\Providers;

use Illuminate\Support\ServiceProvider;
use Ministrare\Cmscore\Library\Input;
use Ministrare\Cmscore\Library\Utilities;


class CoreServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('utilities', function($app) {
            return new Utilities;
        });
        $this->app->bind('input', function($app) {
            return new Input;
        });


        info('Ministrare/Cmscore is loaded!');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'cmscore');
    }
}
