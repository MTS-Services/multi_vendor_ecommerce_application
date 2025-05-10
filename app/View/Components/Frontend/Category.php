<?php

namespace App\View\Components\Frontend;

use Closure;
use Illuminate\View\Component;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;

class Category extends Component
{
    public array|Collection $category;

    public function __construct(array|Collection $category)
    {
        $this->category = $category;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.category');
    }
}
