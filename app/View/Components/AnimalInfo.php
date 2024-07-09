<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AnimalInfo extends Component
{
    public $imgSrc;
    public $imgAlt;
    public $name;
    public $description;
    public $race;
    public $age;
    public $diet;
    public $consumption;

    public function __construct($imgSrc, $imgAlt, $name, $description, $race, $age, $diet, $consumption)
    {
        $this->imgSrc = $imgSrc;
        $this->imgAlt = $imgAlt;
        $this->name = $name;
        $this->description = $description;
        $this->race = $race;
        $this->age = $age;
        $this->diet = $diet;
        $this->consumption = $consumption;
    }

    public function render()
    {
        return view('components.animal-info');
    }
}
