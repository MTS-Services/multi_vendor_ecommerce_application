<?php

namespace App\View\Components\Frontend;

use Closure;
use Illuminate\View\Component;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;

class Brand extends Component
{

    public array|Collection $datas;

    public function __construct($datas)
    {
        $this->datas = $datas;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.brand');
    }
}
