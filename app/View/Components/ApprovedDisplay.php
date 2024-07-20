<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ApprovedDisplay extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public bool|null $approved
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if ($this->approved === true) {
            return 'Approved';
        } elseif ($this->approved === false) {
            return 'Rejected';
        }
        return 'Pending';
    }
}
