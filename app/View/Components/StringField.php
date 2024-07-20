<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Str;

class StringField extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $label = '',
        public string|null $value = '',
        public string $type = 'text',
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if (empty($this->label)) {
            $this->label = Str::ucfirst(str_replace('_', ' ', $this->name));
        }
        return view('components.string-field');
    }
}
