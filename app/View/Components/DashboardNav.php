<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashboardNav extends Component
{
    public $links;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->links = [
            ['url' => '/accounts', 'name' => 'Accounts'],
            ['url' => '/activities', 'name' => 'Activities'],
            ['url' => '/exhibits', 'name' => 'Exhibits'],
            ['url' => '/animals', 'name' => 'Animals'],
            ['url' => '/veterinarian-reports', 'name' => 'Veterinarian reports'],
            ['url' => '/opening-hours', 'name' => 'Opening hours'],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('components.dashboard-nav');
    }
}
