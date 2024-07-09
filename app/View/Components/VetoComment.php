<?php

namespace App\View\Components;

use Illuminate\View\Component;

class VetoComment extends Component
{
    public $imgSrc;
    public $name;
    public $role;
    public $date;
    public $comment;

    public function __construct($imgSrc, $name, $role, $date, $comment)
    {
        $this->imgSrc = $imgSrc;
        $this->name = $name;
        $this->role = $role;
        $this->date = $date;
        $this->comment = $comment;
    }

    public function render()
    {
        return view('components.veto-comment');
    }
}
