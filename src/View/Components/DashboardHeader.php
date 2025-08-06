<?php

namespace Aumtics\AumticsComponents\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DashboardHeader extends Component
{
    public $pageTitle;
    public $breadcrumbItems = array();
    
    /**
     * Create a new component instance.
     */
    public function __construct($pageTitle = '', $breadcrumbItems = [])
    {
        $this->pageTitle = $pageTitle;
        $this->breadcrumbItems = $breadcrumbItems;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('aumtics-components::components.dashboard-header');
    }
} 