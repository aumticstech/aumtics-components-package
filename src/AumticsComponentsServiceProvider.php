<?php

namespace Aumtics\AumticsComponents;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AumticsComponentsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Load views
        $this->loadViewsFrom(__DIR__.'/resources/views', 'aumtics-components');

        // Register Blade components
        $this->registerBladeComponents();

        // Publish views
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/resources/views' => resource_path('views/vendor/aumtics-components'),
            ], 'aumtics-components-views');

            // Publish config if needed
            $this->publishes([
                __DIR__.'/../config/aumtics-components.php' => config_path('aumtics-components.php'),
            ], 'aumtics-components-config');
        }
    }

    /**
     * Register all Blade components
     */
    protected function registerBladeComponents(): void
    {
        // Register components with their class paths
        Blade::component('aumtics-table', \Aumtics\AumticsComponents\View\Components\Table::class);
        Blade::component('aumtics-alert', \Aumtics\AumticsComponents\View\Components\Alert::class);
        Blade::component('aumtics-dashboard-header', \Aumtics\AumticsComponents\View\Components\DashboardHeader::class);
    }
} 