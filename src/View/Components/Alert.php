<?php

namespace Aumtics\AumticsComponents\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public $message;
    public $type;

    /**
     * Create a new component instance.
     */
    public function __construct($message = '', $type = 'info')
    {
        $this->message = $message;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('aumtics-components::components.alert');
    }
} 