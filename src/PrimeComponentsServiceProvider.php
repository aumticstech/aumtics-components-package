<?php

namespace Aumtics\PrimeComponents;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class PrimeComponentsServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(__DIR__.'/resources/views', 'prime-components');

        // Register Blade components
        $this->registerBladeComponents();

        // Publish views
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/resources/views' => resource_path('views/vendor/prime-components'),
            ], 'prime-components-views');

            // Publish config if needed
            $this->publishes([
                __DIR__.'/../config/prime-components.php' => config_path('prime-components.php'),
            ], 'prime-components-config');
        }
    }

    /**
     * Register all Blade components
     */
    protected function registerBladeComponents(): void
    {
        // Register components with their class paths
        Blade::component('prime-table', \Aumtics\PrimeComponents\View\Components\Table::class);
        Blade::component('prime-top-header', \Aumtics\PrimeComponents\View\Components\TopHeader::class);
        Blade::component('prime-dashboard-header', \Aumtics\PrimeComponents\View\Components\DashboardHeader::class);
        Blade::component('prime-dashboard-settings', \Aumtics\PrimeComponents\View\Components\DashboardSettings::class);
        Blade::component('prime-sidebar-menu', \Aumtics\PrimeComponents\View\Components\SidebarMenu::class);
        Blade::component('prime-custom-field', \Aumtics\PrimeComponents\View\Components\CustomField::class);
        Blade::component('prime-alert', \Aumtics\PrimeComponents\View\Components\Alert::class);
        Blade::component('prime-loader', \Aumtics\PrimeComponents\View\Components\Loader::class);
        Blade::component('prime-no-data-found', \Aumtics\PrimeComponents\View\Components\NoDataFound::class);
        Blade::component('prime-sub-sidebar', \Aumtics\PrimeComponents\View\Components\SubSidebar::class);
        Blade::component('prime-customer-basket', \Aumtics\PrimeComponents\View\Components\CustomerBasket::class);
        Blade::component('prime-assigned-organization', \Aumtics\PrimeComponents\View\Components\AssignedOrganization::class);
        Blade::component('prime-dashboard-footer', \Aumtics\PrimeComponents\View\Components\DashboardFooter::class);
    }
} 