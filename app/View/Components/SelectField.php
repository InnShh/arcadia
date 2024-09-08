<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class SelectField extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public Collection $items,
        public string $label,
        public string $values = 'id',
        public string $labels = 'name',
        public string|int|null $selected = null,
        public bool $required = false,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select-field');
    }
}
