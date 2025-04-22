<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Alert extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $type,
        public string $name
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert');
    }

    public function languages($language)
    {
        return [
            'PHP',
            'JavaScript',
            'HTML',
            'Java',
            $language
        ];
    }

    public function language(){
        return "Rust";
    }
}
