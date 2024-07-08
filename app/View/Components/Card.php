<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public $href;
    public $img;
    public $title;
    public $text;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($href, $img, $title, $text)
    {
        $this->href = $href;
        $this->img = $img;
        $this->title = $title;
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.card');
    }
}
