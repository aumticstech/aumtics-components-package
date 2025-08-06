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
        Blade::component('aumtics-top-header', \Aumtics\AumticsComponents\View\Components\TopHeader::class);
        Blade::component('aumtics-dashboard-header', \Aumtics\AumticsComponents\View\Components\DashboardHeader::class);
        Blade::component('aumtics-dashboard-settings', \Aumtics\AumticsComponents\View\Components\DashboardSettings::class);
        Blade::component('aumtics-sidebar-menu', \Aumtics\AumticsComponents\View\Components\SidebarMenu::class);
        Blade::component('aumtics-custom-field', \Aumtics\AumticsComponents\View\Components\CustomField::class);
        Blade::component('aumtics-alert', \Aumtics\AumticsComponents\View\Components\Alert::class);
        Blade::component('aumtics-loader', \Aumtics\AumticsComponents\View\Components\Loader::class);
        Blade::component('aumtics-no-data-found', \Aumtics\AumticsComponents\View\Components\NoDataFound::class);
        Blade::component('aumtics-sub-sidebar', \Aumtics\AumticsComponents\View\Components\SubSidebar::class);
        Blade::component('aumtics-customer-basket', \Aumtics\AumticsComponents\View\Components\CustomerBasket::class);
        Blade::component('aumtics-assigned-organization', \Aumtics\AumticsComponents\View\Components\AssignedOrganization::class);
        Blade::component('aumtics-dashboard-footer', \Aumtics\AumticsComponents\View\Components\DashboardFooter::class);
    }
} 