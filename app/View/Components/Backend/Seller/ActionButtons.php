<?php

namespace App\View\Components\Backend\Seller;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ActionButtons extends Component
{

    public $menuItems;
    /**
     * Create a new component instance.
     */
    public function __construct($menuItems)
    {
        $this->menuItems = $menuItems;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.backend.seller.action-buttons');
    }
}
