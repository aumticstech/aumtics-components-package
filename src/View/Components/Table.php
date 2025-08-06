<?php

namespace Aumtics\AumticsComponents\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Table extends Component
{
    public $cardId = '';
    
    public function __construct($cardId = '')
    {
        $this->cardId = $cardId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('aumtics-components::components.table');
    }
} 