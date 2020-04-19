<?php

namespace Hooshid\Helpers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * register the service provider
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/helpers.php', 'helpers');

        //include the active package helpers
        foreach (config('helpers.package_helpers', []) as $activeHelper) {

            $file = __DIR__ . '/Helpers/' . $activeHelper . '.php';

            if (file_exists($file)) {
                require_once($file);
            }
        }

        //load custom helpers with a mapper
        if (count(config('helpers.custom_helpers', []))) {

            foreach (config('helpers.custom_helpers', []) as $customHelper) {

                $file = app_path() . '/' . $this->getHelpersDirectory() . '/' . $customHelper . '.php';

                if (file_exists($file)) {
                    require_once($file);
                }
            }
        } //load custom helpers automatically
        else {
            //include the custom helpers
            foreach (glob(app_path() . '/' . $this->getHelpersDirectory() . '/*.php') as $file) {
                require_once($file);
            }
        }
    }

    /**
     * boot the service provider
     *
     * @return void
     */
    public function boot()
    {
        //register commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\HelperMakeCommand::class,
            ]);
        }

        // publish configuration
        $this->publishes([
            __DIR__ . '/config/helpers.php' => config_path('helpers.php'),
        ], 'config');
    }

    /**
     * get the directory the helpers are stored in
     *
     * @return mixed
     */
    public function getHelpersDirectory()
    {
        return config('helpers.directory', 'Helpers');
    }
}
