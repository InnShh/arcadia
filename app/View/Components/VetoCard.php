<?php

namespace App\View\Components;

use Illuminate\View\Component;

class VetoCard extends Component
{
    public $imgSrc;
    public $name;
    public $role;
    public $date;

    public function __construct($imgSrc, $name, $role, $date)
    {
        $this->imgSrc = $imgSrc;
        $this->name = $name;
        $this->role = $role;
        $this->date = $date;
    }

    public function render()
    {
        return view('components.veto-card');
    }
}
